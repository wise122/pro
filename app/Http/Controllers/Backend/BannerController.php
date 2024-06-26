<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use View;

class BannerController extends Controller
{
    protected $model;
    protected $title      = 'Banner';
    protected $view       = 'backend.banner.';
    protected $route      = 'banner.';
    protected $permission = '-banner';

    public function __construct(Banner $model)
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
                    ->editColumn('description', function($data){
                        $desc = $data->description;
                        if (strlen($desc) > 100) {
                            $cut = substr($desc, 0, 50);
                            $point = strrpos($cut, ' ');
                            $desc = $point ? substr($cut, 0, $point) : substr($cut, 0);
                        }
                        return $desc;
                    })
                    ->editColumn('status', function ($data) {
                        if ($data->status == '0') {
                            return '<span class="badge badge-danger">Tidak Aktif</span>';
                        } else {
                            return '<span class="badge badge-success">Aktif</span>';
                        }
                    })
                    ->editColumn('cover', function ($data) {
                        return '<img src="' . $data->cover . '" border="0" width="60" class="img-rounded" align="center" />';
                    })
                    ->addIndexColumn()
                    ->setRowId(function ($data){
                        return $data->id;
                    })
                    ->rawColumns(['cover', 'status'])
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
                    'title' => 'required',
                    'status' => 'required',
                    'urutan' => 'required|unique:banners,urutan'
                ],
                [
                    'cover.required' => 'Silahkan Pilih Gambar Cover !',
                    'title.required' => 'Silahkan Masukkan Title !',
                    'status.required' => 'Silahkan Pilih Status !',
                    'urutan.required' => 'Silahkan Masukkan Urutan Banner !',
                    'urutan.unique' => 'Urutan Banner '.$request->urutan.' Sudah ada !'
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->route($this->route.'create')->with('error', $messages->first())->withInput();
            }

            $banner = new $this->model();
            $banner->cover = $request->cover;
            $banner->link = $request->link;
            $banner->title = $request->title;
            $banner->status = $request->status;
            $banner->urutan = $request->urutan;
            $banner->description = $request->description;
            $banner->save();

            return redirect()->route($this->route.'index')->with('success', 'Banner Berhasil disimpan !');
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
                    'cover' => 'required',
                    'title' => 'required',
                    'status' => 'required',
                    'urutan' => 'required|unique:banners,urutan,'.$id,
                ],
                [
                    'cover.required' => 'Silahkan Masukkan Banner !',
                    'title.required' => 'Silahkan Masukkan Title !',
                    'status.required' => 'Silahkan Pilih Status !',
                    'urutan.required' => 'Silahkan Masukkan Urutan Banner !',
                    'urutan.unique' => 'Urutan Banner Sudah ada !'
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->route($this->route.'edit', $id)->with('error', $messages->first())->withInput();
            }

            $banner = $this->model::find($id);
            $banner->cover = $request->cover;
            $banner->link = $request->link;
            $banner->title = $request->title;
            $banner->status = $request->status;
            $banner->urutan = $request->urutan;
            $banner->description = $request->description;
            $banner->update();

            return redirect()->route($this->route.'index')->with('success', 'Banner Berhasil diupdate !');
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
                if ($data->cover && file_exists(storage_path('app/public/banner/'.$data->cover))) {
                    \Storage::delete('public/banner/' . $data->cover);
                }
            }

            $data->delete();

            return redirect()->route($this->route.'index')->with('success', 'Bts Propaktani Berhasil dihapus !');
        } catch (\Exception $err) {
            return redirect()->route($this->route.'edit', $id)->with('error', $err->getMessage());
        }
    }
}
