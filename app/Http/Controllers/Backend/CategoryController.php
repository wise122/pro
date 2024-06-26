<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Str;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::select();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    return view('backend.datatables.action_ajax', [
                        'model' => $data,
                        'can_edit' => 'edit-Category',
                        'can_delete' => 'delete-Category',
                        'form_url' => route('category.destroy', $data->id),
                        'edit_url' => route('category.edit', $data->id),
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
        return view('backend.category.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.create');
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
                        'title' => 'required|unique:categories,title',
                        'status' => 'required',
                    ],
                    [
                        'title.required' => 'Silahkan Masukkan Judul !',
                        'title.unique' => 'Judul sudah pernah diinput !',
                        'status.required' => 'Silahkan Pilih status !',
                    ]
                );
            } else {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'title' => 'required|unique:categories,title,' . $request->id,

                    ],
                    [
                        'title.required' => 'Silahkan Masukkan Judul !',
                        'title.unique' => 'Judul sudah pernah diinput !',
                    ]
                );
            }

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                throw new \Exception($messages->first());
            }

            if ($request->id == null){

                $category = new Category();
                $category->title = $request->title;
                $category->seotitle = Str::slug($request->title , "-");
                $category->status = $request->status;
                $category->save();
            } else {
                $category = Category::find($request->id);
                $category->title = $request->title;
                $category->seotitle = Str::slug($request->title, "-");
                $category->status = $request->status;
                $category->update();
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
            $response =[
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
            $category = Category::find($id);

            $status = true;
            $data['view'] = view('backend.category.edit', compact('category'))->render();
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
        try{
            $validator = \Validator::make(
                $request->all(),
                [
                    'title' => 'required|unique:categories,title,'.$id,
                    'status' => 'required',
                ],
                [
                    'title.required' => 'Silahkan Masukkan Judul !',
                    'title.unique' => 'Judul sudah pernah diinput !',
                    'status.required' => 'Silahkan Pilih status !',
                ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->route('category.edit', $id)->with('error', $messages->first())->withInput();
            }

            $category = Category::find($id);
            $category->title = $request->title;
            $category->seotitle = Str::slug($request->title , "-");
            $category->status = $request->status;
            $category->update();

            return redirect()->route('category.index');
        }catch(\Exception $e){
            return redirect()->route('category.edit', $id)->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource form storage.
     */
    public function destroy(string $id)
    {
        $status = false;
        try {
            $category = Category::find($id);
            $category->delete();

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
        //
    }
}
