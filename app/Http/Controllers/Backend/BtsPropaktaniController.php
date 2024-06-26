<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BtsPropaktani;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Yajra\DataTables\Facades\DataTables;
use View;

class BtsPropaktaniController extends Controller
{
    protected $model;
    protected $title      = 'Bts Propaktani';
    protected $view       = 'backend.bts-propaktani.';
    protected $route      = 'bts-propaktani.';
    protected $permission = '-bts-propaktani';

    public function __construct(BtsPropaktani $model)
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
                    'video_id' => 'required|unique:bts_propaktanis,youtube_id',
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
                return Redirect::route($this->route . 'create')->with('error', $messages->first())->withInput();
            }

            $bts = new $this->model();
            $bts->user_id = $this->user()->id;
            $bts->youtube_id = $request->video_id;
            $bts->judul = $request->judul;
            $bts->tanggal = date('Y-m-d', strtotime($request->tgl));
            $bts->episode = $request->episode;
            $bts->active = $request->active;
            $bts->status = $request->status;
            if ($request->file('cover')) {
                $uploadfile = $request->file('cover');
                $filename = $uploadfile->hashName();
                $uploadfile->store('bts', 'public');
                $bts->cover = $filename;
            }
            $bts->save();

            $content = new Content();
            $content->user_id = $this->user()->id;
            $content->slug = str()->slug($bts->judul, '-');
            $content->active = $bts->active;
            $content->status = $bts->status;
            $content->content_type = 'App\Models\BtsPropaktani';
            $content->content_id = $bts->id;
            $content->save();

            return Redirect::route($this->route . 'index')->with('success', 'Bts Propaktani Berhasil disimpan !');
        } catch (\Exception $err) {
            return Redirect::route($this->route . 'create')->with('error', $err->getMessage());
        }
    }

    public function edit($id)
    {
        if (\Auth::user()->isAbleTo('edit' . $this->permission)) {
            $data = $this->model::find($id);
            $data->tanggal = date('d-m-Y', strtotime($data->tanggal));

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
                    'video_id' => 'required|unique:bts_propaktanis,youtube_id,' . $id,
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
                return Redirect::route($this->route . 'edit', $id)->with('error', $messages->first())->withInput();
            }

            $bts = $this->model::find($id);
            $bts->user_id = $this->user()->id;
            $bts->youtube_id = $request->video_id;
            $bts->judul = $request->judul;
            $bts->tanggal = date('Y-m-d', strtotime($request->tgl));
            $bts->episode = $request->episode;
            $bts->active = $request->active;
            $bts->status = $request->status;
            if ($request->file('cover')) {
                if ($bts->cover && file_exists(storage_path('app/public/bts/' . $bts->cover))) {
                    \Storage::delete('public/bts/' . $bts->cover);
                }
                $uploadfile = $request->file('cover');
                $filename = $uploadfile->hashName();
                $uploadfile->store('bts', 'public');
                $bts->cover = $filename;
            }
            $bts->update();

            // Update Contents
            DB::table('contents')
                ->where('content_id', $id)
                ->where('content_type', 'App\Models\BtsPropaktani')
                ->update(
                    [
                        'user_id' => $bts->user_id,
                        'slug' => str()->slug($bts->judul, '-'),
                        'active' => $bts->active,
                        'status' => $bts->status
                    ]
                );

            return Redirect::route($this->route . 'index')->with('success', 'Bts Propaktani Berhasil disimpan !');
        } catch (\Exception $err) {
            return Redirect::route($this->route . 'create')->with('error', $err->getMessage());
        }
    }

    public function destroy($id)
    {
        if (\Auth::user()->isAbleTo('delete' . $this->permission)) {
            $data = $this->model::find($id);
            if ($data->cover) {
                if ($data->cover && file_exists(storage_path('app/public/bts/' . $data->cover))) {
                    \Storage::delete('public/bts/' . $data->cover);
                }
            }
            DB::table('contents')->where('content_id', $id)->where('content_type', 'App\Models\BtsPropaktani')->delete();

            $data->delete();

            return Redirect::route($this->route . 'index')->with('success', 'Bts Propaktani Berhasil dihapus !');
        } else {
            return Redirect::back()->with('error', __('Permission denied.'));
        }
    }
}
