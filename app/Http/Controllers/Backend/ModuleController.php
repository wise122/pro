<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use View;
use Yajra\DataTables\Facades\DataTables;

class ModuleController extends Controller
{
    protected $model;
    protected $title      = 'Module';
    protected $view       = 'backend.module.';
    protected $route      = 'module.';
    protected $permission = '-module';

    public function __construct(Module $model)
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
                        return view('backend.datatables.action_modal', [
                            'row_id' => $data->id,
                            'can_edit' => 'edit'.$this->permission,
                            'can_delete' => 'delete'.$this->permission
                        ]);
                    })
                    ->addIndexColumn()
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view($this->view.'index');
        } else {
            return redirect()->back()->with('error', __('Permission denied'));
        }
    }

    public function store(Request $request)
    {
        $status = false;
        try {
            if ($request->id) {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'name' => 'required|unique:modules,name,'.$request->id
                    ],
                    [
                        'name.required' => 'Silahkan masukkan Nama Module !',
                        'name.unique' => 'Nama Module sudah tersedia !',
                    ]
                );
            } else {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'name' => 'required|unique:modules,name'
                    ],
                    [
                        'name.required' => 'Silahkan masukkan Nama Module !',
                        'name.unique' => 'Nama Module sudah tersedia !',
                    ]
                );
            }

            if ($validator->fails()) {
                $message = $validator->getMessageBag();
                throw new \Exception($message->first());
            }

            $this->model::updateOrCreate(
                ['id' => $request->id],
                ['name' => $request->name]
            );

            $status = true;
            $data['message'] = 'Module Berhasil disimpan !';
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

    public function edit($id)
    {
        $status = false;
        try {
            $module = $this->model::find($id);

            $status = true;
            $response = [
                'status' => $status,
                'data' => $module
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

    public function destroy($id)
    {
        $status = false;
        try {
            $this->model::find($id)->delete();

            $status = true;
            $data['message'] = 'Module Berhasil dihapus !';
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
}
