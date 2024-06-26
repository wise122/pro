<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use View;
use Yajra\DataTables\Facades\DataTables;

class NewsController extends Controller
{
    protected $model;
    protected $title      = 'Berita Propaktani';
    protected $view       = 'backend.news.';
    protected $route      = 'news.';
    protected $permission = '-news';

    public function __construct(News $model)
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
                    ->editColumn('image', function ($data) {
                        $url = asset('storage/news/' . $data->image);
                        return '<img src="' . $url . '" border="0" width="60" class="img-rounded" align="center" />';
                    })
                    ->editColumn('status', function ($data) {
                        if ($data->status == 'draft') {
                            return '<span class="badge badge-danger">Tidak Aktif</span>';
                        } else {
                            return '<span class="badge badge-success">Aktif</span>';
                        }
                    })
                    ->setRowId(function ($data){
                        return $data->id;
                    })
                    ->rawColumns(['image', 'status', 'action'])
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
                    'image' => 'required|mimes:jpg,jpeg,png|max:2048|dimensions:min_width=900,min_height=616,max_width=900,max_height=616',
                    'content' => 'required',
                ],
                [
                    'title.required' => 'Silahkan Masukkan Title !',
                    'image.required' => 'Silahkan Pilih Gambar !',
                    'image.mimes' => 'Silahkan Pilih Gambar dengan Format JPG, JPEG, PNG !',
                    'image.max' => 'Silahkan Pilih Gambar dengan size 2 MB !',
                    'image.dimensions' => 'Silahkan Pilih Gambar dengan ukuran 900x616 !',
                    'content.required' => 'Silahkan Masukkan Konten !',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->route($this->route.'create')->with('error', $messages->first())->withInput();
            }

            $news = new $this->model();
            if ($request->file('image')) {
                $uploadfile = $request->file('image');
                $filename = $uploadfile->hashName();
                $uploadfile->store('news', 'public');
                $news->image = $filename;
            }
            $news->title = $request->title;
            $news->user_id = $this->user()->id;
            $news->slug = str()->slug($request->title, '-');
            $news->metadesc = $request->metadesc;
            $news->metadata = $request->metadata;
            $news->metakey = $request->metakey;
            $news->active = $request->active;
            $news->status = $request->status;
            $news->content = $request->content;
            $news->save();

            // Create Content
            $content = new Content();
            $content->user_id = $news->user_id;;
            $content->slug = $news->title;
            $content->active = $news->active;
            $content->status = $news->status;
            $content->content_type = 'App\Models\News';
            $content->content_id = $news->id;
            $content->save();

            return redirect()->route($this->route.'index')->with('success', 'News Berhasil disimpan !');
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
                    'image' => 'mimes:jpg,jpeg,png|max:2048|dimensions:min_width=900,min_height=616,max_width=900,max_height=616',
                    'content' => 'required',
                ],
                [
                    'title.required' => 'Silahkan Masukkan Title !',
                    'image.mimes' => 'Silahkan Pilih Gambar dengan Format JPG, JPEG, PNG !',
                    'image.max' => 'Silahkan Pilih Gambar dengan size 2 MB !',
                    'image.dimensions' => 'Silahkan Pilih Gambar dengan ukuran 900x616 !',
                    'content.required' => 'Silahkan Masukkan Konten !',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->route($this->route.'edit', $id)->with('error', $messages->first())->withInput();
            }

            $news = $this->model::find($id);
            if ($request->file('image')) {
                if ($news->image && file_exists(storage_path('app/public/news/' . $news->image))) {
                    \Storage::delete('public/news/' . $news->image);
                }
                $uploadfile = $request->file('image');
                $filename = $uploadfile->hashName();
                $uploadfile->store('news', 'public');
                $news->image = $filename;
            }
            $news->title = $request->title;
            $news->user_id = $this->user()->id;
            $news->slug = str()->slug($request->title, '-');
            $news->metadesc = $request->metadesc;
            $news->metadata = $request->metadata;
            $news->metakey = $request->metakey;
            $news->active = $request->active;
            $news->status = $request->status;
            $news->content = $request->content;
            $news->update();

            // Update Contents
            DB::table('contents')
            ->where('content_id', $id)
            ->where('content_type', 'App\Models\News')
            ->update(
                [
                    'user_id' => $news->user_id,
                    'slug' => $news->title,
                    'active' => $news->active,
                    'status' => $news->status
                ]
            );

            return redirect()->route($this->route.'index')->with('success', 'News Berhasil diupdate !');
        } catch (\Exception $err) {
            return redirect()->route($this->route.'edit', $id)->with('error', $err->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $data = $this->model::find($id);
            // menghapus Gambar lama, jika ada
            if ($data->image) {
                if ($data->image && file_exists(storage_path('app/public/news/'.$data->image))) {
                    \Storage::delete('public/news/' . $data->image);
                }
            }
            DB::table('contents')->where('content_id', $id)->where('content_type', 'App\Models\News')->delete();

            $data->delete();

            return redirect()->route($this->route.'index')->with('success', 'News Berhasil dihapus !');
        } catch (\Exception $err) {
            return redirect()->route($this->route.'index')->with('error', $err->getMessage());
        }
    }
}
