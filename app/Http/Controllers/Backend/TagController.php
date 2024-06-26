<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Str;
use Yajra\DataTables\Facades\DataTables;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Tag::select();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    return view('backend.datatables.action_ajax', [
                        'model' => $data,
                        'can_edit' => 'edit-Tag',
                        'can_delete' => 'delete-Tag',
                        'form_url' => route('tag.destroy', $data->id),
                        'edit_url' => route('tag.edit', $data->id),

                        'confirm_message' => 'Yakin mau menghapus ' . $data->name . '?'
                    ]);
                })
                ->editColumn('status', function ($data) {
                    if ($data->status == '0') {
                        return '<span class="badge badge-danger">Tidak Aktif</span>';
                    } else {
                        return '<span class="badge badge-success">Aktif</span>';
                    }
                })
                ->addIndexColumn()
                ->setRowId(function ($data) {
                    return $data->id;
                })
                ->rawColumns(['status'])
                ->make(true);
        }
        return view('backend.tag.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status = false;
        try {
            if ($request->id == null) {

                $validator = \Validator::make(
                    $request->all(),
                    [
                        'name' => 'required|unique:tags,name',
                        'status' => 'required',
                    ],
                    [
                        'name.required' => 'Silahkan Masukkan Judul !',
                        'name.unique' => 'Judul sudah pernah diinput !',
                        'status.required' => 'Silahkan Pilih status !',
                        ]
                    );
                } else {

                    $validator = \Validator::make(
                    $request->all(),
                    [
                        'name' => 'required|unique:tags,name,' . $request->id,
                        'status' => 'required',
                    ],
                    [
                        'name.required' => 'Silahkan Masukkan Judul !',
                        'name.unique' => 'Judul sudah pernah diinput !',
                    ]
                );
            }

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                throw new \Exception($messages->first());
            }

            if ($request->id == null) {

                $tag = new Tag();
                $tag->name = $request->name;
                $tag->slug = Str::slug($request->name, "-");
                $tag->status = $request->status;
                $tag->save();
            } else {
                $tag = Tag::find($request->id);
                $tag->name = $request->name;
                $tag->slug = Str::slug($request->name, "-");
                $tag->status = $request->status;
                $tag->update();
            }

            $status = true;
            $data['message'] = 'Data telah tersimpan !';

            $response = [
                'status' => $status,
                'data' => $data
            ];
            return response()->json($response);
        } catch (\Exception $err) {
            $data['message'] = $err->getMessage();
            $response = [
                'data' => $data,
                'status' => $status
            ];
            return response()->json($response);
        }
        //
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
        $status = false;
        try {
            $tag = Tag::find($id);

            $status = true;
            $data['view'] = view('backend.tag.edit', compact('tag'))->render();
            $response = [
                'status' => $status,
                'data' => $data
            ];

            return response()->json($response);
        } catch (\Exception $er) {
            $data['message'] = $er->getmessage();
            $response = [
                'status' => $status,
                'data' => $data
            ];
            return response()->json($response);
        }
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $validator = \Validator::make(
                $request->all(),
                [
                    'name' => 'required|unique:tags,name,'  .$id,
                    'status' => 'required',
                ],
                [
                    'name.required' => 'Silahkan Masaukan nama !',
                    'name.unique' => 'nama sudah pernah diinput !',
                    'status.required' => 'Silahkan Pilih status !',
                ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->route('tag.edit', $id)->with('error', $messages->first())->withInput();
            }

            $tag = tag::find($id);
            $tag->name = $request->name;
            $tag->slug = Str::slug($request->name, "-");
            $tag->status = $request->status;
            $tag->update();

            return redirect()->route('tag.index');
        }catch(\Exception $e){
            return redirect()->route('tag.edit', $id)->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Tag::find($id);

            $data->delete();

            return redirect()->route('tag.index')->with('success', 'Tag Propaktani Berhasil dihapus !');
        } catch (\Exception $err) {
            return redirect()->route('tag.edit', $id)->with('error', $err->getMessage());
        }
        //
    }
}
