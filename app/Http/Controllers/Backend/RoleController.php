<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Role;
use View;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    protected $model;
    protected $title      = 'Role';
    protected $view       = 'backend.role.';
    protected $route      = 'role.';
    protected $permission = '-role';

    public function __construct(Role $model)
    {
        $this->model = $model;

        View::share('title', $this->title);
        View::share('view', $this->view);
        View::share('route', $this->route);
        View::share('permission', $this->permission);

        $this->middleware('permission:'.'manage'.$this->permission)->only('index');
        $this->middleware('permission:'.'create'.$this->permission)->only('create', 'store');
        $this->middleware('permission:'.'edit'.$this->permission)->only('edit', 'update');
    }

    public function user()
    {
        return auth()->user();
    }

    public function index(Request $request)
    {
        if (\Auth::user()->isAbleTo('manage'.$this->permission)) {
            if ($request->ajax()) {
                $data = $this->model::with([
                    'permission_role' => function ($sql) {
                        $sql->with('permission');
                    }
                ]);
                return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    return view('backend.datatables.action_nondelete', [
                        'edit_url' => route($this->route.'edit', $data->id),
                        'can_edit' => 'edit'.$this->permission
                    ]);
                })
                ->editColumn('permission_role', function ($data) {
                    $permisson_name = [];
                    foreach ($data->permission_role as $row) {
                        // return $row->permission->display_name;
                        array_push($permisson_name, $row->permission->display_name);
                        // return count($permisson_name) ?
                        //     '<span class="badge badge-primary">'.implode('</span> <span class="badge badge-primary">', $row->permission->display_name).'</span>' : '';
                        // $permisson_name .= ' ' . '<span class="badge badge-primary">' .
                        // $row->permission->display_name . '</span>';
                    }
                    return count($permisson_name) ?
                            '<span class="badge badge-primary">'.implode('</span> <span class="badge badge-primary">', $permisson_name).'</span>' : '';
                    // return count($permisson_name);
                })
                ->addIndexColumn()
                ->rawColumns(['permission_role', 'action'])
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
                    'name' => 'required|unique:roles',
                    'display_name' => 'required',
                    'description' => 'required'
                ],
                [
                    'name.required' => 'Silahkan masukkan Nama Role !',
                    'name.unique' => 'Nama Role sudah tersedia !',
                    'display_name.required' => 'Silahkan masukkan Nama Display !',
                    'description.required' => 'Silahkan masukkan Deskripsi !',
                ]
            );

            if ($validator->fails()) {
                $message = $validator->getMessageBag();
                return redirect()->back()->with('error', $message->first());
            }

            $role = new $this->model();
            $role->name = $request->name;
            $role->display_name = $request->display_name;
            $role->description = $request->description;
            $role->save();

            return redirect()->route($this->route.'edit', $role->id)->with('success', 'Role Berhasil disimpan !');
        } catch (\Exception $err) {
            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    public function edit($id)
    {
        if (\Auth::user()->isAbleTo('edit'.$this->permission)) {
            $data_module = Module::with([
                'permission'
            ])
            ->whereHas('permission')
            ->get();
            $data = $this->model::find($id);

            return view($this->view.'edit', compact('data_module', 'data'));
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
                    'name' => 'required|unique:roles,name,'.$id,
                    'display_name' => 'required',
                    'description' => 'required'
                ],
                [
                    'name.required' => 'Silahkan masukkan Nama Role !',
                    'name.unique' => 'Nama Role sudah tersedia !',
                    'display_name.required' => 'Silahkan masukkan Nama Display !',
                    'description.required' => 'Silahkan masukkan Deskripsi !',
                ]
            );

            if ($validator->fails()) {
                $message = $validator->getMessageBag();
                return redirect()->back()->with('error', $message->first());
            }

            $role = Role::find($id);
            $role->name = $request->name;
            $role->display_name = $request->display_name;
            $role->description = $request->description;
            $role->update();

            return redirect()->route($this->route.'index')->with('success', 'Role Berhasil diupdate !');
        } catch (\Exception $err) {
            return redirect()->back()->with('error', $err->getMessage());
        }
    }
}
