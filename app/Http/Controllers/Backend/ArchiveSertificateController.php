<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ArsipSertifikat;
use Illuminate\Http\Request;
use View;
use Yajra\DataTables\Facades\DataTables;
use Ramsey\Uuid\Uuid;

class ArchiveSertificateController extends Controller
{
    protected $model;
    protected $title      = 'Arsip Sertifikat';
    protected $view       = 'backend.archive-sertificate.';
    protected $route      = 'archive-sertificate.';
    protected $permission = '-arsip-sertifikat';

    public function __construct(ArsipSertifikat $model)
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
                    ->setRowId(function ($data) {
                        return $data->id;
                    })
                    ->rawColumns(['action'])
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
                    'no_hp' => 'required',
                    'file' => 'required|mimes:pdf|max:2048'
                ],
                [
                    'title.required' => 'Silahkan Masukkan Judul !',
                    'no_hp.required' => 'Silahkan Masukkan No Hp !',
                    'file.required' => 'Silahkan Pilih File !',
                    'file.mimes' => 'Silahkan Pilih File dengan Format PDF !',
                    'file.max' => 'Silahkan Pilih File dengan size 2 MB !'
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->route($this->route . 'create')->with('error', $messages->first())->withInput();
            }

            $certificate = new $this->model();
            if ($request->file('file')) {
                $uploadfile = $request->file('file');
                $filename = $uploadfile->hashName();
                $uploadfile->store('archive-certificate', 'public');
                $certificate->file = $filename;
            }
            $certificate->user_id = $this->user()->id;
            $certificate->no_hp = $request->no_hp;
            $certificate->uid = Uuid::uuid4();
            $certificate->judul = $request->title;
            $certificate->save();

            return redirect()->route($this->route . 'index')->with('success', 'Arsip Sertifikat Berhasil disimpan !');
        } catch (\Exception $err) {
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
                    'no_hp' => 'required',
                    'file' => 'mimes:pdf|max:2048'
                ],
                [
                    'title.required' => 'Silahkan Masukkan Judul !',
                    'no_hp.required' => 'Silahkan Masukkan No Hp !',
                    'file.mimes' => 'Silahkan Pilih File dengan Format PDF !',
                    'file.max' => 'Silahkan Pilih File dengan size 2 MB !',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->route($this->route . 'edit', $id)->with('error', $messages->first())->withInput();
            }

            $certificate = $this->model::find($id);
            if ($request->file('file')) {
                if ($certificate->file && file_exists(storage_path('app/public/archive-certificate/' . $certificate->file))) {
                    \Storage::delete('public/archive-certificate/' . $certificate->file);
                }
                $uploadfile = $request->file('file');
                $filename = $uploadfile->hashName();
                $uploadfile->store('archive-certificate', 'public');
                $certificate->file = $filename;
            }
            $certificate->user_id = $this->user()->id;
            $certificate->no_hp = $request->no_hp;
            $certificate->uid = Uuid::uuid4();
            $certificate->judul = $request->title;
            $certificate->update();

            return redirect()->route($this->route . 'index')->with('success', 'Arsip Sertifikat Berhasil diupdate !');
        } catch (\Exception $err) {
            return redirect()->route($this->route . 'edit', $id)->with('error', $err->getMessage());
        }
    }
}
