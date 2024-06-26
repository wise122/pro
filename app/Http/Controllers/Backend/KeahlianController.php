<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keahlian;
use Yajra\DataTables\DataTables;
use function Ramsey\Collection\element;

class KeahlianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Keahlian::select();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    return view('backend.datatables.action_ajax', [
                        'model' => $data,
                        'can_edit' => 'edit-Keahlian',
                        'can_delete' => 'delete-Keahlian',
                        'form_url' => route('keahlian.destroy', $data->id),
                        'edit_url' => route('keahlian.edit', $data->id),

                        'confirm_message' => 'Yakin mau menghapus' . $data->name . '?'
                    ]);
                })
                ->addIndexColumn()
                ->setRowId(function ($data) {
                    return $data->id;
                })
                ->rawColumns(['status'])
                ->make(true);
        }
        return view('backend.keahlian.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
                        'name' => 'required|unique:keahlians,name',
                        'urutan' => 'required|unique:keahlians,urutan',
                    ],
                    [
                        'name.required' => 'Silahkan Masukkan Nama !',
                        'name.unique' => 'Judul sudah pernah diinput !',
                        'urutan.required' => 'Silahkan Masukkan Urutan !',
                        'urutan.unique' => 'Urutan sudah pernah diinput !',
                    ]
                );
            } else {

                $validator = \Validator::make(
                    $request->all(),
                    [
                        'name' => 'required|unique:keahlians,name,' . $request->id,
                        'urutan' => 'required|unique:keahlians,urutan,' . $request->id,
                    ],
                    [
                        'name.required' => 'Silahkan Masukkan Judul !',
                        'name.unique' => 'Judul sudah pernah diinput !',
                        'urutan.required' => 'Silahkan Masukkan Urutan !',
                        'urutan.unique' => 'Urutan sudah pernah diinput !',
                    ]
                );
            }

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                throw new \Exception($messages->first());
            }

            if ($request->id == null){

                $keahlian = new Keahlian();
                $keahlian->name = $request->name;
                $keahlian->urutan = $request->urutan;
                $keahlian->save();
            } else {
                $keahlian = Keahlian::find($request->id);
                $keahlian->name = $request->name;
                $keahlian->urutan = $request->urutan;
                $keahlian->update();
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
            $keahlian = Keahlian::find($id);

            $status = true;
            $data['view'] = view('backend.keahlian.edit', compact('keahlian'))->render();
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
                    'name' => 'required|unique:keahlians,name,' . $id,
                    'urutan' => 'required|unique:keahlians,urutan,' . $id,
                ],
                [
                    'name.required' => 'Silahkan Masaukan nama !',
                    'name.unique' => 'nama sudah pernah diinput !',
                    'urutan.required' => 'Silahkan Masaukan urutan !',
                    'urutan.unique' => 'Urutan sudah pernah diinput !',
                ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->route('keahlian.edit', $id)->with('error', $messages->first())->withInput();
            }

            $keahlian = Keahlian::find($id);
            $keahlian->name = $request->name;
            $keahlian->urutan = $request->urutan;
            $keahlian->update();

            return redirect()->route('keahlian.index');
        } catch (\Exception $e) {
            return redirect()->route('keahlian.edit', $id)->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Keahlian::find($id);

            $data->delete();

            return redirect()->route('keahlian.index')->with('success', 'Keahlian Propaktani Berhasil dihapus !');
        } catch (\Exception $err) {
            return redirect()->route('keahlian.edit', $id)->with('error', $err->getMessage());
        }
    }
}
