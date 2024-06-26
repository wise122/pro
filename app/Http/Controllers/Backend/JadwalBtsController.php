<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use App\Models\JadwalBts;
use App\Models\Keahlian;
use App\Models\PesertaBts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use View;
use Yajra\DataTables\Facades\DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use PDF;

class JadwalBtsController extends Controller
{
    protected $model;
    protected $title      = 'Jadwal BTS';
    protected $view       = 'backend.bts-schedule.';
    protected $route      = 'bts-schedule.';
    protected $permission = '-jadwal-bts';

    protected function determineRole($peran)
    {
        $roles = [
            'peserta' => 'PESERTA',
            'narsum' => 'NARASUMBER',
            'moderator' => 'MODERATOR',
        ];

        return $roles[$peran] ?? 'PESERTA';
    }

    public function __construct(JadwalBts $model)
    {
        $this->model = $model;

        View::share('title', $this->title);
        View::share('view', $this->view);
        View::share('route', $this->route);
        View::share('permission', $this->permission);

        $this->middleware('permission:' . 'manage' . $this->permission)->only('index');
        $this->middleware('permission:' . 'create' . $this->permission)->only('create', 'store');
        $this->middleware('permission:' . 'edit' . $this->permission)->only('edit', 'update');
        $this->middleware('permission:' . 'delete' . $this->permission)->only('destroy');
    }

    public function user()
    {
        return auth()->user();
    }

    public function index(Request $request)
    {
        if (\Auth::user()->isAbleTo('manage' . $this->permission)) {
            if ($request->ajax()) {
                $data = $this->model::select();
                return DataTables::of($data)
                    ->addColumn('action', function ($data) {
                        return view('backend.datatables.show', [
                            'model' => $data,
                            'form_url' => route($this->route . 'delete', $data->id),
                            'edit_url' => route($this->route . 'edit', $data->id),
                            'can_edit' => 'edit' . $this->permission,
                            'can_delete' => 'delete' . $this->permission,
                            'can_show' => 'manage' . $this->permission,
                            'show_url' => route($this->route . 'show', $data->id),
                            'confirm_message' => 'Ingin menghapus data ini'
                        ]);
                    })
                    ->editColumn('pelaksanaan_awal', function ($data) {
                        return date('j F Y H:i:s', strtotime($data->pelaksanaan_awal));
                    })
                    ->editColumn('pelaksanaan_akhir', function ($data) {
                        return date('j F Y H:i:s', strtotime($data->pelaksanaan_akhir));
                    })
                    ->setRowId(function ($data) {
                        return $data->id;
                    })
                    ->addIndexColumn()
                    ->make(true);
            }
            return view($this->view . 'index');
        } else {
            return Redirect::back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if (\Auth::user()->isAbleTo('create' . $this->permission)) {

            return view($this->view . 'create');
        } else {
            return Redirect::back()->with('error', __('Permission denied.'));
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = \Validator::make(
                $request->all(),
                [
                    'judul' => 'required',
                    'pelaksanaan_awal' => 'required',
                    'pelaksanaan_akhir' => 'required',
                    'zoom' => 'required'
                ],
                [
                    'judul.required' => 'Silahkan Masukkan Judul !',
                    'pelaksanaan_awal.required' => 'Silahkan Masukkan Pelaksanaan Awal !',
                    'pelaksanaan_akhir.required' => 'Silahkan Masukkan Pelaksanaan Akhir !',
                    'zoom.required' => 'Silahkan Masukkan Link Zoom !'
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return Redirect::route($this->route . 'create')->with('error', $messages->first())->withInput();
            }

            $jadwal_bts = new $this->model();
            if ($request->file('cover')) {
                $uploadfile = $request->file('cover');
                $filename = $uploadfile->hashName();
                $uploadfile->store('bts-schedule', 'public');
                $jadwal_bts->cover = $filename;
            }
            $jadwal_bts->user_id = $this->user()->id;
            $jadwal_bts->slug = str()->slug($request->judul, '-');
            $jadwal_bts->judul = $request->judul;
            $jadwal_bts->zoom = $request->zoom;
            $jadwal_bts->nara_sumber = $request->narasumber != null ? json_encode($request->narasumber) : null;
            $jadwal_bts->pelaksanaan_awal = date('Y-m-d H:i:s', strtotime($request->pelaksanaan_awal));
            $jadwal_bts->pelaksanaan_akhir = date('Y-m-d H:i:s', strtotime($request->pelaksanaan_akhir));
            $jadwal_bts->id_youtube = $request->video_id != null ? $request->video_id : null;
            $jadwal_bts->save();

            return Redirect::route($this->route . 'index')->with('success', 'Jadwal BTS Berhasil disimpan !');
        } catch (\Exception $err) {
            return Redirect::route($this->route . 'create')->with('error', $err->getMessage());
        }
    }

    public function edit($id)
    {
        if (\Auth::user()->isAbleTo('edit' . $this->permission)) {
            $data = $this->model::find($id);
            $data->pelaksanaan_awal = date('d-m-Y H:i', strtotime($data->pelaksanaan_awal));
            $data->pelaksanaan_akhir = date('d-m-Y H:i', strtotime($data->pelaksanaan_akhir));

            return view($this->view . 'edit', compact('data'));
        } else {
            return Redirect::back()->with('error', __('Permission denied.'));
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = \Validator::make(
                $request->all(),
                [
                    'judul' => 'required',
                    'pelaksanaan_awal' => 'required',
                    'pelaksanaan_akhir' => 'required',
                    'zoom' => 'required'
                ],
                [
                    'judul.required' => 'Silahkan Masukkan Judul !',
                    'pelaksanaan_awal.required' => 'Silahkan Masukkan Pelaksanaan Awal !',
                    'pelaksanaan_akhir.required' => 'Silahkan Masukkan Pelaksanaan Akhir !',
                    'zoom.required' => 'Silahkan Masukkan Link Zoom !'
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return Redirect::route($this->route . 'edit', $id)->with('error', $messages->first())->withInput();
            }

            $jadwal_bts = $this->model::find($id);
            if ($request->file('cover')) {
                if ($jadwal_bts->cover && file_exists(storage_path('app/public/bts-schedule/' . $jadwal_bts->cover))) {
                    \Storage::delete('public/bts-schedule/' . $jadwal_bts->cover);
                }
                $uploadfile = $request->file('cover');
                $filename = $uploadfile->hashName();
                $uploadfile->store('bts-schedule', 'public');
                $jadwal_bts->cover = $filename;
            }
            $jadwal_bts->user_id = $this->user()->id;
            $jadwal_bts->slug = str()->slug($request->judul, '-');
            $jadwal_bts->judul = $request->judul;
            $jadwal_bts->zoom = $request->zoom;
            $jadwal_bts->nara_sumber = $request->narasumber != null ? json_encode($request->narasumber) : null;
            $jadwal_bts->pelaksanaan_awal = date('Y-m-d H:i:s', strtotime($request->pelaksanaan_awal));
            $jadwal_bts->pelaksanaan_akhir = date('Y-m-d H:i:s', strtotime($request->pelaksanaan_akhir));
            $jadwal_bts->id_youtube = $request->video_id != null ? $request->video_id : null;
            $jadwal_bts->update();

            return Redirect::route($this->route . 'index')->with('success', 'Jadwal BTS Berhasil diupdate !');
        } catch (\Exception $err) {
            return Redirect::route($this->route . 'edit', $id)->with('error', $err->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $data = $this->model::find($id);
            // menghapus Gambar lama, jika ada
            if ($data->cover) {
                if ($data->cover && file_exists(storage_path('app/public/bts-schedule/' . $data->cover))) {
                    \Storage::delete('public/bts-schedule/' . $data->cover);
                }
            }
            $data->delete();

            return Redirect::route($this->route . 'index')->with('success', 'Jadwal BTS Berhasil dihapus !');
        } catch (\Exception $err) {
            return Redirect::route($this->route . 'index')->with('error', $err->getMessage());
        }
    }

    public function show($id)
    {
        $jadwal_bts = JadwalBts::find($id);
        $jadwal_bts->pelaksanaan_awal = date('d-m-Y H:i', strtotime($jadwal_bts->pelaksanaan_awal));
        $jadwal_bts->pelaksanaan_akhir = date('d-m-Y H:i', strtotime($jadwal_bts->pelaksanaan_akhir));
        $instansi = Instansi::get();
        $user = User::select('id', 'name', 'no_hp')->get();
        $keahlians = Keahlian::get();

        return view($this->view . 'show')->with(compact('jadwal_bts', 'instansi', 'user', 'keahlians'));
    }

    public function getPeserta(Request $request, $id)
    {
        if ($request->ajax()) {
            $peserta = DB::table('peserta_bts')
                ->select('peserta_bts.nama', 'peserta_bts.nama_instansi', 'peserta_bts.peran', 'instansis.name as instansi', 'peserta_bts.uuid', 'keahlians.name as keahlian')
                ->leftJoin('instansis', 'peserta_bts.instansi_id', '=', 'instansis.id')
                ->leftJoin('keahlians', 'peserta_bts.keahlian_id', '=', 'keahlians.id')
                ->whereIn('peserta_bts.peran', ['narsum', 'moderator'])
                ->where('peserta_bts.jadwal_bts_id', $id);
            return DataTables::of($peserta)
                ->editColumn('peran', function ($peserta) {
                    if ($peserta->peran == 'peserta') {
                        return '<span class="badge badge-primary">Peserta</span>';
                    }
                    if ($peserta->peran == 'moderator') {
                        return '<span class="badge badge-success">Moderator</span>';
                    }
                    if ($peserta->peran == 'narsum') {
                        return '<span class="badge badge-warning">Narasumber</span>';
                    }
                })
                ->addColumn('action', function ($peserta) {
                    return '<a href="' . route('bts-schedule.sertificate', $peserta->uuid) . '" target="_blank" class="btn btn-success waves-effect waves-light">Sertifikat</a>';
                })
                ->rawColumns(['peran', 'action'])
                ->make(true);
        }
    }

    public function storePeserta(Request $request)
    {
        $status = false;
        try {
            $peserta = new PesertaBts();
            $peserta->instansi_id = $request->instansi_id;
            $peserta->uuid = Uuid::uuid4();
            $peserta->nama = $request->name;
            $peserta->nama_instansi = $request->nama_instansi;
            $peserta->user_id = $request->user_id;
            $peserta->jadwal_bts_id = $request->id;
            $peserta->peran = $request->peran;
            $peserta->keahlian_id = $request->keahlian;
            $peserta->save();

            $status = true;
            $data['message'] = 'Tersimpan !';
            $response = [
                'status' => $status,
                'data' => $data
            ];
            return response()->json($response);
        } catch (\Exception $e) {
            $data['message'] = $e->getMessage();
            $response = [
                'status' => $status,
                'data' => $data
            ];
            return response()->json($response);
        }
    }

    public function getSertificate($uuid)
    {
        try {
            Carbon::setLocale('id');

            $peserta_bts = PesertaBts::with('jadwal_bts')->where('uuid', $uuid)->firstOrFail();

            if ($peserta_bts->jadwal_bts->pelaksanaan_akhir->isFuture()) {
                throw new \Exception('Pelaksanaan BTS Belum Selesai !');
            }

            $tanggal = $peserta_bts->jadwal_bts->pelaksanaan_awal->format('d-m-Y');

            $qrcode = base64_encode(QrCode::format('svg')->size(120)->errorCorrection('H')->generate($peserta_bts->uuid));

            $role = $this->determineRole($peserta_bts->peran);

            $images = [
                'imgLambang' => public_path("assets/images/logo-1.png"),
                'imgLogoBts' => public_path("assets/images/logo2.png"),
                'imgBg' => public_path("assets/images/bg-image-propaktani.png"),
                'imgSignature' => public_path("assets/images/signature.png"),
                'imgQrCode' => public_path("assets/images/qrcode.png"),
            ];

            $pdf = PDF::loadview('pdf.certificate', compact('peserta_bts', 'tanggal', 'qrcode', 'role') + $images);
            $pdf->setPaper('letter', 'landscape');

            return $pdf->stream('Sertifikat ' . $peserta_bts->jadwal_bts->judul . '.pdf');
        } catch (\Exception $e) {
            return Redirect::back()->with('error', $e->getMessage());
        }
    }
}
