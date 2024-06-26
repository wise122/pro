<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Content;
use App\Models\Tag;
use View;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class IotController extends Controller
{
    protected $model;
    protected $title      = 'IOT';
    protected $view       = 'backend.iot.';
    protected $route      = 'iot.';
    protected $permission = '-iot';

    public function __construct(Article $model)
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
                $data = $this->model::where('type', 'iot')->select();
                return DataTables::of($data)
                    ->addColumn('action', function ($data) {
                        return view('backend.datatables.action', [
                            'model' => $data,
                            'form_url' => route($this->route . 'delete', $data->id),
                            'edit_url' => route($this->route . 'edit', $data->id),
                            'can_edit' => 'edit' . $this->permission,
                            'can_delete' => 'delete' . $this->permission,
                            'confirm_message' => 'Ingin menghapus data ini'
                        ]);
                    })
                    ->editColumn('image', function ($data) {
                        $url = asset('storage/iot/' . $data->image);
                        return '<img src="' . $url . '" border="0" width="60" class="img-rounded" align="center" />';
                    })
                    ->editColumn('status', function ($data) {
                        if ($data->status == 'draft') {
                            return '<span class="badge badge-danger">Tidak Aktif</span>';
                        } else {
                            return '<span class="badge badge-success">Aktif</span>';
                        }
                    })
                    ->setRowId(function ($data) {
                        return $data->id;
                    })
                    ->rawColumns(['image', 'status', 'action'])
                    ->addIndexColumn()
                    ->make(true);
            }
            return view($this->view . 'index');
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (\Auth::user()->isAbleTo('create' . $this->permission)) {
            $category = Category::where('status', 1)->orderBy('id', 'asc')->pluck('title', 'id')->toArray();
            $tag = Tag::where('status', 1)->orderBy('id', 'asc')->pluck('name', 'id')->toArray();

            return view($this->view . 'create')->with(compact('category', 'tag'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = \Validator::make(
                $request->all(),
                [
                    'title' => 'required',
                    'category' => 'required',
                    'tag' => 'required',
                    'image' => 'required|mimes:jpg,jpeg,png|max:2048|dimensions:min_width=900,min_height=616,max_width=900,max_height=616',
                    'content' => 'required',
                ],
                [
                    'title.required' => 'Silahkan Masukkan Title !',
                    'category.required' => 'Silahkan Pilih Kategori !',
                    'tag.required' => 'Silahkan Pilih Tag !',
                    'image.required' => 'Silahkan Pilih Gambar !',
                    'image.mimes' => 'Silahkan Pilih Gambar dengan Format JPG, JPEG, PNG !',
                    'image.max' => 'Silahkan Pilih Gambar dengan size 2 MB !',
                    'image.dimensions' => 'Silahkan Pilih Gambar dengan ukuran 900x616 !',
                    'content.required' => 'Silahkan Masukkan Konten !',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->route($this->route . 'create', $request->type)->with('error', $messages->first())->withInput();
            }

            $article = new $this->model();
            if ($request->file('image')) {
                $uploadfile = $request->file('image');
                $filename = $uploadfile->hashName();
                $uploadfile->store('articles', 'public');
                $article->image = $filename;
            }
            $article->title = $request->title;
            $article->user_id = $this->user()->id;
            $article->slug = str()->slug($request->title, '-');
            $article->metadesc = $request->metadesc;
            $article->metadata = $request->metadata;
            $article->metakey = $request->metakey;
            $article->active = $request->active;
            $article->status = $request->status;
            $article->content = $request->content;
            $article->type = 'iot';
            $article->category_id = $request->category;
            $article->tag_id = json_encode($request->tag);
            $article->save();

            $content = new Content();
            $content->user_id = $article->user_id;
            $content->slug = $article->title;
            $content->active = $article->active;
            $content->status = $article->status;
            $content->content_type = 'App\Models\Article';
            $content->content_id = $article->id;
            $content->save();

            return redirect()->route($this->route . 'index')->with('success', 'Artikel Berhasil disimpan !');
        } catch (\Exception $err) {
            return redirect()->route($this->route . 'create', $request->type)->with('error', $err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (\Auth::user()->isAbleTo('edit' . $this->permission)) {
            $data = $this->model::find($id);
            $category = Category::where('status', 1)->orderBy('id', 'asc')->pluck('title', 'id')->toArray();
            $tag = Tag::where('status', 1)->orderBy('id', 'asc')->pluck('name', 'id')->toArray();

            return view($this->view . 'edit', compact('data', 'category', 'tag'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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
                return redirect()->route($this->route . 'edit', $id)->with('error', $messages->first())->withInput();
            }

            $article = $this->model::find($id);
            if ($request->file('image')) {
                if ($article->image && file_exists(storage_path('app/public/articles/' . $article->image))) {
                    \Storage::delete('public/articles/' . $article->image);
                }
                $uploadfile = $request->file('image');
                $filename = $uploadfile->hashName();
                $uploadfile->store('articles', 'public');
                $article->image = $filename;
            }
            $article->title = $request->title;
            $article->user_id = $this->user()->id;
            $article->slug = str()->slug($request->title, '-');
            $article->metadesc = $request->metadesc;
            $article->metadata = $request->metadata;
            $article->metakey = $request->metakey;
            $article->active = $request->active;
            $article->status = $request->status;
            $article->content = $request->content;
            $article->category_id = $request->category;
            $article->tag_id = json_encode($request->tag);
            $article->update();

            // Update Contents
            DB::table('contents')
                ->where('content_id', $id)
                ->where('content_type', 'App\Models\Article')
                ->update(
                    [
                        'user_id' => $article->user_id,
                        'slug' => $article->title,
                        'active' => $article->active,
                        'status' => $article->status
                    ]
                );

            return redirect()->route($this->route . 'index')->with('success', 'News Berhasil diupdate !');
        } catch (\Exception $err) {
            return redirect()->route($this->route . 'edit', $id)->with('error', $err->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = $this->model::find($id);
            // menghapus Gambar lama, jika ada
            if ($data->image) {
                if ($data->image && file_exists(storage_path('app/public/articles/' . $data->image))) {
                    \Storage::delete('public/articles/' . $data->image);
                }
            }
            DB::table('contents')->where('content_id', $id)->where('content_type', 'App\Models\Article')->delete();

            $data->delete();

            return redirect()->route($this->route . 'index')->with('success', 'Artikel Berhasil dihapus !');
        } catch (\Exception $err) {
            return redirect()->route($this->route . 'index')->with('error', $err->getMessage());
        }
    }
}
