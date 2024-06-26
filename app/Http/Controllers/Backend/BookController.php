<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;
use View;
use Yajra\DataTables\Facades\DataTables;

class BookController extends Controller
{
    protected $model;
    protected $title      = 'Buku';
    protected $view       = 'backend.book.';
    protected $route      = 'book.';
    protected $permission = '-buku';

    public function __construct(Buku $model)
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
                        return view('backend.datatables.action', [
                            'model' => $data,
                            'form_url' => route($this->route . 'delete', $data->id),
                            'edit_url' => route($this->route . 'edit', $data->id),
                            'can_edit' => 'edit' . $this->permission,
                            'can_delete' => 'delete' . $this->permission,
                            'confirm_message' => 'Ingin menghapus data ini'
                        ]);
                    })
                    ->editColumn('cover', function ($data) {
                        $url = asset('storage/books/' . $data->cover);
                        return '<img src="' . $url . '" border="0" width="60" class="img-rounded" align="center" />';
                    })
                    ->editColumn('tipe_buku', function ($data) {
                        if ($data->tipe_buku == 'berbayar') {
                            return '<span class="badge badge-danger">Berbayar</span>';
                        } elseif ($data->tipe_buku == 'gratis') {
                            return '<span class="badge badge-secondary">Gratis</span>';
                        }
                    })
                    ->setRowId(function ($data) {
                        return $data->id;
                    })
                    ->rawColumns(['cover', 'tipe_buku', 'action'])
                    ->addIndexColumn()
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
                    'title' => 'required',
                    'tipe_buku' => 'required',
                    'file' => 'required',
                    'cover' => 'required',
                ],
                [
                    'title.required' => 'Silahkan Masukkan Judul !',
                    'tipe_buku.required' => 'Silahkan Pilih Tipe Buku !',
                    'file.required' => 'Silahkan Pilih File !',
                    'cover.required' => 'Silahkan Pilih Cover !'
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                dd($messages);
                return redirect()->route($this->route . 'create')->with('error', $messages->first())->withInput();
            }

            $books = new $this->model();
            if ($request->file('file')) {
                $uploadfile = $request->file('file');
                $filename = $uploadfile->hashName();
                $uploadfile->store('books', 'public');
                $books->file = $filename;
            }
            $books->cover = $request->cover;
            $books->judul = $request->title;
            $books->slug = str()->slug($request->title, '-');
            $books->tipe_buku = $request->tipe_buku;
            $books->save();

            return redirect()->route($this->route . 'index')->with('success', 'Buku Berhasil disimpan !');
        } catch (\Exception $err) {
            dd($err);
            return redirect()->route($this->route . 'create')->with('error', $err->getMessage());
        }
    }

    public function edit($id)
    {
        if (\Auth::user()->isAbleTo('edit' . $this->permission)) {
            $data = $this->model::find($id);

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
                    'title' => 'required',
                    'tipe_buku' => 'required',
                    'file' => 'mimes:pdf|max:2048',
                    'cover' => 'mimes:jpg,jpeg,png|max:2048|dimensions:min_width=900,min_height=616,max_width=900,max_height=616',
                ],
                [
                    'title.required' => 'Silahkan Masukkan Judul !',
                    'tipe_buku.required' => 'Silahkan Pilih Tipe Buku !',
                    'file.mimes' => 'Silahkan Pilih File dengan Format PDF !',
                    'file.max' => 'Silahkan Pilih File dengan size 2 MB !',
                    'cover.mimes' => 'Silahkan Pilih Cover dengan Format JPG, JPEG, PNG !',
                    'cover.max' => 'Silahkan Pilih Cover dengan size 2 MB !',
                    'cover.dimensions' => 'Silahkan Pilih Cover dengan ukuran 900x616 !',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->route($this->route . 'edit', $id)->with('error', $messages->first())->withInput();
            }

            $books = $this->model::find($id);
            if ($request->file('file')) {
                if ($books->file && file_exists(storage_path('app/public/books/' . $books->file))) {
                    \Storage::delete('public/books/' . $books->file);
                }
                $uploadfile = $request->file('file');
                $filename = $uploadfile->hashName();
                $uploadfile->store('books', 'public');
                $books->file = $filename;
            }
            if ($request->file('cover')) {
                if ($books->cover && file_exists(storage_path('app/public/books/' . $books->cover))) {
                    \Storage::delete('public/books/' . $books->cover);
                }
                $uploadfile = $request->file('cover');
                $filename = $uploadfile->hashName();
                $uploadfile->store('books', 'public');
                $books->cover = $filename;
            }
            $books->judul = $request->title;
            $books->slug = str()->slug($request->title, '-');
            $books->tipe_buku = $request->tipe_buku;
            $books->update();

            return redirect()->route($this->route . 'index')->with('success', 'Buku Berhasil diupdate !');
        } catch (\Exception $err) {
            return redirect()->route($this->route . 'edit', $id)->with('error', $err->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $data = $this->model::find($id);
            // menghapus File PDF lama, jika ada
            if ($data->file) {
                if ($data->file && file_exists(storage_path('app/public/books/' . $data->file))) {
                    \Storage::delete('public/books/' . $data->file);
                }
            }
            // menghapus Gambar lama, jika ada
            if ($data->cover) {
                if ($data->cover && file_exists(storage_path('app/public/books/' . $data->cover))) {
                    \Storage::delete('public/books/' . $data->cover);
                }
            }
            $data->delete();

            return redirect()->route($this->route . 'index')->with('success', 'Buku Berhasil dihapus !');
        } catch (\Exception $err) {
            return redirect()->route($this->route . 'index')->with('error', $err->getMessage());
        }
    }
}
