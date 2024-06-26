<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use View;
use Yajra\DataTables\Facades\DataTables;

class VideoController extends Controller
{
    protected $model;
    protected $title      = 'Video';
    protected $view       = 'backend.video.';
    protected $route      = 'video.';
    protected $permission = '-video';

    public function __construct(Video $model)
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
                    ->editColumn('id_youtube', function($data){
                        if($data->id_youtube != null){
                            return '<a target="_blank" href="https://www.youtube.com/watch?v='.$data->id_youtube.'">'.$data->id_youtube.'</a>';
                        }else{
                            return '';
                        }
                    })
                    ->editColumn('cover', function ($data) {
                        $url = asset('storage/video/' . $data->cover);
                        return '<img src="' . $url . '" border="0" width="60" class="img-rounded" align="center" />';
                    })
                    ->setRowId(function ($data){
                        return $data->id;
                    })
                    ->rawColumns(['cover', 'action', 'id_youtube'])
                    ->addIndexColumn()
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
                    'title' => 'required',
                    'youtube' => 'required',
                    'cover' => 'required|mimes:jpg,jpeg,png|max:2048|dimensions:min_width=900,min_height=616,max_width=900,max_height=616',
                ],
                [
                    'title.required' => 'Silahkan Masukkan Judul !',
                    'youtube.required' => 'Silahkan Masukkan Youtube Id !',
                    'cover.required' => 'Silahkan Pilih Cover !',
                    'cover.mimes' => 'Silahkan Pilih Cover dengan Format JPG, JPEG, PNG !',
                    'cover.max' => 'Silahkan Pilih Cover dengan size 2 MB !',
                    'cover.dimensions' => 'Silahkan Pilih Cover dengan ukuran 900x616 !',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->route($this->route.'create')->with('error', $messages->first())->withInput();
            }

            $video = new $this->model();
            if ($request->file('cover')) {
                $uploadfile = $request->file('cover');
                $filename = $uploadfile->hashName();
                $uploadfile->store('video', 'public');
                $video->cover = $filename;
            }
            $video->judul = $request->title;
            $video->slug = str()->slug($request->title, '-');
            $video->id_youtube = $request->youtube;
            $video->save();

            return redirect()->route($this->route.'index')->with('success', 'Video Berhasil disimpan !');
        } catch (\Exception $err) {
            return redirect()->route($this->route.'create')->with('error', $err->getMessage());
        }
    }

    public function edit($id)
    {
        if (\Auth::user()->isAbleTo('edit'.$this->permission)) {
            $data = $this->model::find($id);

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
                    'title' => 'required',
                    'youtube' => 'required',
                    'cover' => 'mimes:jpg,jpeg,png|max:2048|dimensions:min_width=900,min_height=616,max_width=900,max_height=616',
                ],
                [
                    'title.required' => 'Silahkan Masukkan Title !',
                    'youtube.required' => 'Silahkan Masukkan Youtube Id !',
                    'cover.mimes' => 'Silahkan Pilih Cover dengan Format JPG, JPEG, PNG !',
                    'cover.max' => 'Silahkan Pilih Cover dengan size 2 MB !',
                    'cover.dimensions' => 'Silahkan Pilih Cover dengan ukuran 900x616 !',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->route($this->route.'edit', $id)->with('error', $messages->first())->withInput();
            }

            $video = $this->model::find($id);
            if ($request->file('cover')) {
                if ($video->cover && file_exists(storage_path('app/public/video/' . $video->cover))) {
                    \Storage::delete('public/video/' . $video->cover);
                }
                $uploadfile = $request->file('cover');
                $filename = $uploadfile->hashName();
                $uploadfile->store('video', 'public');
                $video->cover = $filename;
            }
            $video->judul = $request->title;
            $video->slug = str()->slug($request->title, '-');
            $video->id_youtube = $request->youtube;
            $video->update();

            return redirect()->route($this->route.'index')->with('success', 'Video Berhasil diupdate !');
        } catch (\Exception $err) {
            return redirect()->route($this->route.'edit', $id)->with('error', $err->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $data = $this->model::find($id);
            // menghapus Gambar lama, jika ada
            if ($data->cover) {
                if ($data->cover && file_exists(storage_path('app/public/video/'.$data->cover))) {
                    \Storage::delete('public/video/' . $data->cover);
                }
            }
            $data->delete();

            return redirect()->route($this->route.'index')->with('success', 'Video Berhasil dihapus !');
        } catch (\Exception $err) {
            return redirect()->route($this->route.'index')->with('error', $err->getMessage());
        }
    }
}
