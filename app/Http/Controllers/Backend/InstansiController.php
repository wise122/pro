<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Instansi;
use Yajra\DataTables\Facades\DataTables;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (\Auth::user()->isAbleTo('manage-Instansi')) {
            if ($request->ajax()) {
                $data = Instansi::get();
                return DataTables::of($data)
                    ->addColumn('action', function ($data) {
                        return view('backend.datatables.action_ajax', [
                            'model' => $data,
                            'can_edit' => 'edit-Instansi',
                            'can_delete' => 'delete-Instansi',
                            'form_url' => route('instansi.destroy', $data->id),
                            'edit_url' => route('instansi.edit', $data->id),
                            'confirm_message' => 'Yakin mau menghapus ' . $data->name . '?'
                        ]);
                    })
                    ->addIndexColumn()
                    ->setRowid(function ($data) {})
                    ->rawColumns(['status'])
                    ->make(true);
            }
            return view('backend.instansi.index');
        } else {
            return redirect()->back()->with('error', __('Permission denied'));
        }
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
                        'name' => 'required|unique:instansis,name',
                    ],
                    [
                        'name.required' => 'Silahkan masukkan name !',
                        'name.unique' => 'Name Instansi sudah tersedia !',
                    ]
                );
            } else {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'name' => 'required|unique:instansis,name,' . $request->id,
                    ],
                    [
                        'name.required' => 'Silahkan masukkan Nama Instansi !',
                        'name.unique' => 'Nama Instansi sudah tersedia !',
                    ]
                );
            }

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                throw new \Exception($messages->first());
            }

            $req_data = [
                'user_id' => auth()->user()->id,
                'name' => $request->name,
            ];

            if ($request->id == null) {
                // New
                $instansi = Instansi::create($req_data);
                $data['message'] = 'Instansi Berhasil disimpan !';
            } else {
                // Update
                $instansi = Instansi::find($request->id);
                $instansi->update($req_data);

                $data['message'] = 'Instansi Berhasil diupdate !';
            }

            $status = true;
            $response = [
                'status' => $status,
                'data' => $data
            ];
            return response()->json($response);
        } catch (\Exception $err) {
            $data['message'] = $err->getMessage();
            $response = [
                'status' => $status,
                'data' => $data
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
    public function edit($id)
    {
        $status = false;
        try {
            $instansi = Instansi::find($id);

            $status = true;
            $data['view'] = view('backend.instansi.edit', compact('instansi'))->render();
            $response = [
                'status' => $status,
                'data' => $data
            ];

            return response()->json($response);
        } catch (\Exception $er) {
            $data['message'] = $er->getMessage();
            $response = [
                'status' => $status,
                'data' => $data
            ];
            // return view('backend.instansi.edit')->with(compact('instansi'));
            return response()->json($response);
        }
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status = false;
        try {
            $instansi = Instansi::find($id);
            $instansi->delete();

            $status = true;
            $data['message'] = ' Berhasil dihapus !';
            $response = [
                'status' => $status,
                'data' => $data
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            $data['message'] = $e->getMessage();
            $response = [
                'status' => $status,
                'data' => $data
            ];
            return response()->json($response);
        }
    }
}
