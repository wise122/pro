<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\WeeklySchedule;
use DateTime;
use Illuminate\Http\Request;
use View;
Use Yajra\DataTables\Facades\DataTables;

class JadwalMingguanController extends Controller
{
    protected $model;
    protected $title      = 'Jadwal Mingguan';
    protected $view       = 'backend.weekly-schedule.';
    protected $route      = 'weekly-schedule.';
    protected $permission = '-jadwal-mingguan';

    public function __construct(WeeklySchedule $model)
    {
        $this->model = $model;

        View::share('title', $this->title);
        View::share('view', $this->view);
        View::share('route', $this->route);
        View::share('permission', $this->permission);

        $this->middleware('permission:'.'manage'.$this->permission)->only('index');
        $this->middleware('permission:'.'create'.$this->permission)->only('create', 'store');
        $this->middleware('permission:'.'edit'.$this->permission)->only('edit', 'update');
        $this->middleware('permission:'.'delete'.$this->permission)->only('destroy');
    }

    public function user()
    {
        return auth()->user();
    }

    public function index(Request $request)
    {
        if (\Auth::user()->isAbleTo('manage'.$this->permission)) {
            if ($request->ajax()) {
                $data = $this->model::select();
                return DataTables::of($data)
                    ->addColumn('action', function ($data) {
                        return view('backend.datatables.action', [
                            'model' => $data,
                            'form_url' => route($this->route.'delete', $data->id),
                            'edit_url' => route($this->route.'edit', $data->id),
                            'can_edit' => 'edit'.$this->permission,
                            'can_delete' => 'delete'.$this->permission,
                            'confirm_message' => 'Ingin menghapus data ini'
                        ]);
                    })
                    ->editColumn('cover', function($data){
                        return '<img src="' . $data->cover . '" border="0" width="60" class="img-rounded" align="center" />';
                    })
                    ->editColumn('start_date', function ($data) {
                        return date('j F Y', strtotime($data->start_date));
                    })
                    ->editColumn('end_date', function ($data) {
                        return date('j F Y', strtotime($data->end_date));
                    })
                    ->setRowId(function ($data){
                        return $data->id;
                    })
                    ->addIndexColumn()
                    ->rawColumns(['cover', 'action'])
                    ->make(true);
            }
            return view($this->view.'index');
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if (\Auth::user()->isAbleTo('create'.$this->permission)) {

            return view($this->view.'create');
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = \Validator::make(
                $request->all(),
                [
                    'cover' => 'required',
                    'start_date' => 'required'
                ],
                [
                    'cover.required' => 'Silahkan Pilih Gambar Cover !',
                    'start_date.required' => 'Silahkan Masukkan Tanggal !'
                ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->route($this->route.'create')->with('error', $messages->first())->withInput();
            }

            $jadwalMingguan = new $this->model();
            $jadwalMingguan->cover = $request->cover;
            $jadwalMingguan->start_date = date('Y-m-d', strtotime($request->start_date));
            $jadwalMingguan->end_date = date('Y-m-d', strtotime($request->end_date));
            $jadwalMingguan->save();

            return redirect()->route($this->route.'index')->with('success', 'Jadwal Mingguan Berhasil disimpan !');
        } catch (\Exception $err) {
            return redirect()->route($this->route.'create')->with('error', $err->getMessage());
        }
    }

    public function edit($id)
    {
        if (\Auth::user()->isAbleTo('edit'.$this->permission)) {
            $data = $this->model::find($id);
            $data->start_date = date('d-m-Y', strtotime($data->start_date));
            $data->end_date = date('d-m-Y', strtotime($data->end_date));

            return view($this->view.'edit', compact('data'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = \Validator::make(
                $request->all(),
                [
                    'cover' => 'required',
                    'start_date' => 'required'
                ],
                [
                    'cover.required' => 'Silahkan Pilih Gambar Cover !',
                    'start_date.required' => 'Silahkan Masukkan Tanggal !'
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->route($this->route.'edit', $id)->with('error', $messages->first())->withInput();
            }

            $jadwalMingguan = $this->model::find($id);
            $jadwalMingguan->cover = $request->cover;
            $jadwalMingguan->start_date = date('Y-m-d H:i:s', strtotime($request->start_date));
            $jadwalMingguan->end_date = date('Y-m-d H:i:s', strtotime($request->end_date));
            $jadwalMingguan->update();

            return redirect()->route($this->route.'index')->with('success', 'Jadwal Mingguan Berhasil diupdate !');
        } catch (\Exception $err) {
            return redirect()->route($this->route.'edit', $id)->with('error', $err->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $data = $this->model::find($id);
            $data->delete();

            return redirect()->route($this->route.'index')->with('success', 'Jadwal Mingguan Berhasil dihapus !');
        } catch (\Exception $err) {
            return redirect()->route($this->route.'index')->with('error', $err->getMessage());
        }
    }
}
