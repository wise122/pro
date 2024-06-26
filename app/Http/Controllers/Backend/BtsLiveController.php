<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BtsLive;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use View;

class BtsLiveController extends Controller
{
    protected $model;
    protected $title      = 'Bts Live';
    protected $view       = 'backend.bts-live.';
    protected $route      = 'bts-live.';
    protected $permission = '-bts-live';

    public function __construct(BtsLive $model)
    {
        $this->model = $model;

        View::share('title', $this->title);
        View::share('view', $this->view);
        View::share('route', $this->route);
        View::share('permission', $this->permission);

        $this->middleware('permission:' . 'manage' . $this->permission)->only('index');
        $this->middleware('permission:' . 'create' . $this->permission)->only('create', 'store');
        $this->middleware('permission:' . 'edit' . $this->permission)->only('edit', 'update');
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
                        return view('backend.datatables.action', [
                            'model' => $data,
                            'form_url' => route($this->route . 'destroy', $data->id),
                            'edit_url' => route($this->route . 'edit', $data->id),
                            'can_edit' => 'edit' . $this->permission,
                            'can_delete' => 'delete' . $this->permission,
                            'confirm_message' => 'Ingin menghapus data ini '
                        ]);
                    })
                    ->editColumn('tanggal', function ($data) {
                        return date('j F Y', strtotime($data->tanggal));
                    })
                    ->editColumn('status', function ($data) {
                        if ($data->status == 'publish') {
                            return '<span class="badge badge-success">Publish</span>';
                        } else {
                            return '<span class="badge badge-danger">Draft</span>';
                        }
                    })
                    ->editColumn('youtube_id', function ($data) {
                        if ($data->youtube_id != null) {
                            return '<a target="_blank" href="https://www.youtube.com/watch?v=' . $data->youtube_id . '">' . $data->youtube_id . '</a>';
                        } else {
                            return '';
                        }
                    })
                    ->addIndexColumn()
                    ->setRowId(function ($data) {
                        return $data->id;
                    })
                    ->rawColumns(['status', 'action', 'youtube_id'])
                    ->make(true);
            }
            return view($this->view . 'index');
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if (\Auth::user()->isAbleTo('create' . $this->permission)) {

            return view($this->view . 'create');
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
                    'video_id' => 'required|unique:bts_live,youtube_id',
                    'judul' => 'required',
                    'tgl' => 'required',
                    'episode' => 'required',
                    'cover' => 'required|mimes:jpg,jpeg,png|max:2048|dimensions:max_width=480,max_height=320',
                ],
                [
                    'video_id.required' => 'Silahkan masukkan Youtube Id !',
                    'video_id.unique' => 'Youtube Id sudah tersedia !',
                    'judul.required' => 'Silahkan Masukkan Judul !',
                    'tgl.required' => 'Silahkan Masukkan Tanggal !',
                    'episode.required' => 'Silahkan Masukkan Episode !',
                    'cover.required' => 'Silahkan Pilih Gambar !',
                    'cover.mimes' => 'Silahkan Pilih Gambar dengan Format JPG, JPEG, PNG !',
                    'cover.max' => 'Silahkan Pilih Gambar dengan size 2 MB !',
                    'cover.dimensions' => 'Silahkan Pilih Gambar dengan ukuran max 480x320 !',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->route($this->route . 'create')->with('error', $messages->first())->withInput();
            }

            $live = new $this->model();
            $live->user_id = $this->user()->id;
            $live->youtube_id = $request->video_id;
            $live->judul = $request->judul;
            $live->tanggal = date('Y-m-d', strtotime($request->tgl));
            $live->episode = $request->episode;
            $live->active = $request->active;
            $live->status = $request->status;
            if ($request->file('cover')) {
                $uploadfile = $request->file('cover');
                $filename = $uploadfile->hashName();
                $uploadfile->store('live', 'public');
                $live->cover = $filename;
            }
            $live->save();

            $content = new Content();
            $content->user_id = $this->user()->id;
            $content->slug = str()->slug($live->judul, '-');
            $content->active = $live->active;
            $content->status = $live->status;
            $content->content_type = 'App\Models\BtsLive';
            $content->content_id = $live->id;
            $content->save();

            return redirect()->route($this->route . 'index')->with('success', 'Bts Live Berhasil disimpan !');
        } catch (\Exception $err) {
            return redirect()->route($this->route . 'create')->with('error', $err->getMessage());
        }
    }

    public function edit($id)
    {
        if (\Auth::user()->isAbleTo('edit' . $this->permission)) {
            $data = $this->model::find($id);
            $data->tanggal = date('d-m-Y', strtotime($data->tanggal));

            return view($this->view . 'edit', compact('data'));
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
                    'video_id' => 'required|unique:bts_live,youtube_id,' . $id,
                    'judul' => 'required',
                    'tgl' => 'required',
                    'episode' => 'required',
                    'cover' => 'mimes:jpg,jpeg,png|max:2048|dimensions:max_width=480,max_height=320',
                ],
                [
                    'video_id.required' => 'Silahkan masukkan Youtube Id !',
                    'video_id.unique' => 'Youtube Id sudah tersedia !',
                    'judul.required' => 'Silahkan Masukkan Judul !',
                    'tgl.required' => 'Silahkan Masukkan Tanggal !',
                    'episode.required' => 'Silahkan Masukkan Episode !',
                    'cover.mimes' => 'Silahkan Pilih Gambar dengan Format JPG, JPEG, PNG !',
                    'cover.max' => 'Silahkan Pilih Gambar dengan size 2 MB !',
                    'cover.dimensions' => 'Silahkan Pilih Gambar dengan ukuran max 480x320 !',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->route($this->route . 'edit', $id)->with('error', $messages->first())->withInput();
            }

            $live = $this->model::find($id);
            $live->user_id = $this->user()->id;
            $live->youtube_id = $request->video_id;
            $live->judul = $request->judul;
            $live->tanggal = date('Y-m-d', strtotime($request->tgl));
            $live->episode = $request->episode;
            $live->active = $request->active;
            $live->status = $request->status;
            if ($request->file('cover')) {
                if ($live->cover && file_exists(storage_path('app/public/live/' . $live->cover))) {
                    \Storage::delete('public/live/' . $live->cover);
                }
                $uploadfile = $request->file('cover');
                $filename = $uploadfile->hashName();
                $uploadfile->store('live', 'public');
                $live->cover = $filename;
            }
            $live->update();

            // Update Contents
            DB::table('contents')
                ->where('content_id', $id)
                ->where('content_type', 'App\Models\BtsLive')
                ->update(
                    [
                        'user_id' => $live->user_id,
                        'slug' => str()->slug($live->judul, '-'),
                        'active' => $live->active,
                        'status' => $live->status
                    ]
                );

            return redirect()->route($this->route . 'index')->with('success', 'Bts Live Berhasil disimpan !');
        } catch (\Exception $err) {
            return redirect()->route($this->route . 'create')->with('error', $err->getMessage());
        }
    }

    public function destroy($id)
    {
        if (\Auth::user()->isAbleTo('delete' . $this->permission)) {
            $data = $this->model::find($id);
            // menghapus Gambar lama, jika ada
            if ($data->cover) {
                if ($data->cover && file_exists(storage_path('app/public/live/' . $data->cover))) {
                    \Storage::delete('public/live/' . $data->cover);
                }
            }
            DB::table('contents')->where('content_id', $id)->where('content_type', 'App\Models\BtsLive')->delete();

            $data->delete();

            return redirect()->route($this->route . 'index')->with('success', 'Bts Live Berhasil dihapus !');
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
