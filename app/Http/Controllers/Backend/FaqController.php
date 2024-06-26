<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;
use Str;
use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Faq::with('user')->select();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    return view('backend.datatables.action_ajax', [
                        'model' => $data,
                        'can_edit' => 'edit-Faq',
                        'can_delete' => 'delete-Faq',
                        'form_url' => route('faq.destroy', $data->id),
                        'edit_url' => route('faq.edit', $data->id),
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
                ->editColumn('name', function($data){
                    return $data->user->name;
                })
                ->addIndexColumn()
                ->setRowId(function ($data) {
                    return $data->id;
                })
                ->rawColumns(['status'])
                ->make(true);
        }
        return view('backend.faq.index');
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
                        'title' => 'required|unique:faqs,title',
                        'status' => 'required',
                        'description' => 'required',
                    ],
                    [
                        'title.required' => 'Silahkan Masukkan Title !',
                        'title.unique' => 'Title sudah pernah diinput !',
                        'status.required' => 'Silahkan Pilih status !',
                        'description.required' => 'Silahkan Masukkan Description !',
                    ]
                );
            } else {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'title' => 'required|unique:faqs,title,' . $request->id,
                        'status' => 'required',
                        'description' => 'required',
                    ],
                    [
                        'title.required' => 'Silahkan Masukkan Title !',
                        'title.unique' => 'Title sudah pernah diinput !',
                        'description.required' => 'Silahkan Masukkan Description !',
                    ]
                );
            }
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                throw new \Exception($messages->first());
            }

            if ($request->id == null){

                $faq = new Faq();
                $faq->user_id = auth()->user()->id;
                $faq->title = $request->title;
                $faq->status = $request->status;
                $faq->description = $request->description;
                $faq->save();
            } else {
                $faq = Faq::find($request->id);
                $faq->user_id = auth()->user()->id;
                $faq->title = $request->title;
                $faq->status = $request->status;
                $faq->description = $request->description;
                $faq->update();
            }

            $status =true;
            $data['message'] = 'Data telah tersimpan !';

            $response
             = [
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
    public function edit($id)
    {
        $status = false;
        try {
            $faq = Faq::find($id);
            $status = true;
            $data['view'] = view('backend.faq.edit', compact('faq'))->render();
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

            return response()->json($response);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // try {
        //     $validator = \Validator::make(
        //         $request->all(),
        //         [
        //             'title' => 'required|unique:faqs,title',
        //             'description' => 'required|unique:faqs,description',
        //         ],
        //         [
        //             'title.required' => 'Silahkan Masukkan Title !',
        //             'title.unique' => 'Title sudah pernah diinput !',
        //             'description.required' => 'Silahkan Masukkan Description !',
        //             'description.unique' => 'Description sudah pernah diinput !',
        //         ]
        //     );

        //     if ($validator->fails()) {
        //         $messages = $validator->getMessageBag();
        //         return redirect()->route('faq.edit', $id)->with('error', $messages->first())->withInput();
        //     }

        //     $faq = Faq::find($request->id);
        //     $faq->user_id = $request->user_id;
        //     $faq->title = $request->title;
        //     $faq->description = $request->description;
        //     $faq->update();

        //     return redirect()->route('faq.index');
        // } catch (\Exception $e) {
        //     return redirect()->route('faq.edit', $id)->with('error', $e->getMessage());
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $status = false;
        try {
            $faq = Faq::find($id);
            $faq->delete();

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
