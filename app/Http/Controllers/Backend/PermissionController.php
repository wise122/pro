<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use View;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    protected $model;
    protected $title      = 'Permission';
    protected $view       = 'backend.permission.';
    protected $route      = 'permission.';
    protected $permission = '-permissions';

    public function __construct(Permission $model)
    {
        $this->model = $model;

        View::share('title', $this->title);
        View::share('view', $this->view);
        View::share('route', $this->route);
        View::share('permission', $this->permission);

        $this->middleware('permission:'.'manage'.$this->permission)->only('index');
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
                $data = $this->model::with('module')->select();
                return DataTables::of($data)
                    ->addColumn('action', function ($data) {
                        return view('backend.datatables.action_nondelete', [
                            'model' => $data,
                            'edit_url' => route($this->route.'edit', $data->id),
                            'can_edit' => 'edit'.$this->permission,
                        ]);
                    })
                    ->addIndexColumn()
                    ->make(true);
            }

            return view($this->view.'index');
        } else {
            return redirect()->back()->with('error', __('Permission denied'));
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
        if (\Auth::user()->isAbleTo('edit'.$this->permission)) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'display_name' => 'required',
                    'description' => 'required'
                ],
                [
                    'display_name.required' => 'Silahkan masukkan Nama Module !',
                    'description.required' => 'Nama Module sudah tersedia !',
                ]
            );

            if ($validator->fails()) {
                $message = $validator->getMessageBag();
                return redirect()->back()->with('error', $message->first());
            }

            $permission = Permission::find($id);
            $permission->display_name = $request->display_name;
            $permission->description = $request->description;
            $permission->update();

            return redirect()->route($this->route.'index')->with('success', 'Permission Berhasil diupdate !');
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function active(Request $request,$role_id)
    {
        if (\Auth::user()->isAbleTo('edit'.$this->permission)) {
            $role = Role::find($role_id);
            $role->attachPermission($request->permission);

            $roleUsers = RoleUser::where('role_id', $role_id)->get();
            foreach ($roleUsers as $roleUser) {
                $findRoleUser = User::find($roleUser->user_id);
                $findRoleUser->attachPermission($request->permission);
            }
        } else {
            return redirect()->back();
        }
    }

    public function nonActive(Request $request,$role_id)
    {
        if (\Auth::user()->isAbleTo('edit'.$this->permission)) {
            $role = Role::find($role_id);
            $role->detachPermission($request->permission);

            $roleUsers = RoleUser::where('role_id', $role_id)->get();
            foreach ($roleUsers as $roleUser) {
                $findRoleUser = User::find($roleUser->user_id);
                $findRoleUser->detachPermission($request->permission);
            }
        } else {
            return redirect()->back();
        }
    }
}
