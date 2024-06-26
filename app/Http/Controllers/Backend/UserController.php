<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use View, Auth, Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    protected $model;
    protected $title      = 'Pengguna';
    protected $view       = 'backend.user.';
    protected $route      = 'user.';
    protected $permission = '-user';

    public function __construct(User $model)
    {
        $this->model = $model;

        View::share('title', $this->title);
        View::share('view', $this->view);
        View::share('route', $this->route);
        View::share('permission', $this->permission);

        $this->middleware('permission:'.'manage'.$this->permission)->only('index');
        $this->middleware('permission:'.'create'.$this->permission)->only('create', 'store');
        $this->middleware('permission:'.'edit'.$this->permission)->only('edit', 'update');
        $this->middleware('permission:'.'reset-password')->only('reset_password', 'update_password');
        $this->middleware('permission:'.'manage-account')->only('profile');
        $this->middleware('permission:'.'edit-account')->only('update_profile');
        $this->middleware('permission:'.'change-password-account')->only('password_profile');
    }

    public function user()
    {
        return auth()->user();
    }

    public function index(Request $request)
    {
        if (\Auth::user()->isAbleTo('manage'.$this->permission)) {
            if ($request->ajax()) {
                $data = $this->model::with('roles')->select();
                return DataTables::of($data)
                    ->addColumn('action', function ($data) {
                        return view('backend.datatables.action_user', [
                            'model' => $data,
                            'form_url' => route($this->route.'delete', $data->id),
                            'delete_user' => 'delete'.$this->permission,
                            'edit_url' => route($this->route.'edit', $data->id),
                            'edit_user' => 'edit'.$this->permission,
                            'reset_url' => route($this->route.'reset-password', $data->id),
                            'reset_password' => 'reset-password',
                            'confirm_message' => 'Apakah anda yakin ?'
                        ]);
                    })
                    ->addIndexColumn()
                    ->make(true);
            }
            return view($this->view.'index');
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function create()
    {
        if (\Auth::user()->isAbleTo('create'.$this->permission)) {
            $role = Role::orderBy('name', 'asc')->pluck('name', 'id')->toArray();

            return view($this->view.'create', compact('role'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function store(Request $request)
    {
        try {
            $validator = \Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'no_hp' => 'required|unique:users,no_hp',
                    'email' => 'required|unique:users,email',
                    'role_id' => 'required',
                    'password' => 'required|min:8',
                    'password_confirmation' => 'same:password',
                ],
                [
                    'name.required' => 'Silahkan masukkan Nama Pengguna !',
                    'no_hp.required' => 'Silahkan masukkan No Telepon !',
                    'no_hp.unique' => 'No Telepon sudah tersedia !',
                    'email.required' => 'Silahkan masukkan Email !',
                    'email.unique' => 'Email sudah tersedia !',
                    'role_id.required' => 'Silahkan pilih Hak Akses !',
                    'password.required' => 'Silahkan masukkan Password !',
                    'password.min' => 'Minimal Password 8 karakter !',
                    'password_confirmation.same' => 'Konfirmasi Password tidak sesuai !',
                ]
            );

            if ($validator->fails()) {
                $message = $validator->getMessageBag();
                return redirect()->back()->with('error', $message->first())->withInput();
            }

            $user = new User();
            $user->name = $request->name;
            $user->no_hp = $request->no_hp;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            if ($user->id) {
                $role_user = new RoleUser();
                $role_user->user_id = $user->id;
                $role_user->role_id = $request->role_id;
                $role_user->user_type = 'App\Models\User';
                $role_user->save();
            }

            return redirect()->route($this->route.'index')->with('success', 'User Berhasil disimpan !');
        } catch (\Exception $err) {
            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    public function edit($id)
    {
        if (\Auth::user()->isAbleTo('edit'.$this->permission)) {
            $data = DB::table('users')
                ->join('role_user', 'role_user.user_id', '=', 'users.id')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->select(
                    'users.id as id',
                    'users.name as name',
                    'users.email as email',
                    'roles.name as role_name',
                    'roles.id as role_id'
                )
                ->where('users.id', $id)
                ->first();
            $role = Role::get();

            return view($this->view.'edit', compact('data', 'role'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function update(Request $request, $id)
    {
        if (\Auth::user()->isAbleTo('edit'.$this->permission)) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|unique:users,email,'.$id,
                    'role_id' => 'required'
                ],
                [
                    'name.required' => 'Silahkan masukkan Nama Pengguna !',
                    'email.required' => 'Silahkan masukkan Email !',
                    'email.unique' => 'Email sudah tersedia !',
                    'role_id.required' => 'Silahkan pilih Hak Akses !'
                ]
            );

            if ($validator->fails()) {
                $message = $validator->getMessageBag();
                return redirect()->back()->with('error', $message->first())->withInput();
            }

            $user = User::find($id);
            $user->email = $request->email;
            $user->name = $request->name;
            $user->update();

            DB::table('role_user')->where('user_id', '=', $id)
                ->update(['role_id' => $request->role_id]);

            return redirect()->route($this->route.'index')->with('success', 'User Berhasil diupdate !');
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function reset_password($id)
    {
        if (\Auth::user()->isAbleTo('reset-password')) {
            $data = DB::table('role_user')
                ->join('users', 'role_user.user_id', '=', 'users.id')
                ->join('roles', 'role_user.role_id', '=', 'roles.id')
                ->select('role_user.*', 'users.name', 'users.no_hp', 'users.email', 'users.id', 'roles.display_name')
                ->where('users.id', '=', $id)
                ->first();

            return view($this->view.'reset-password', compact('data'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function update_password(Request $request, $id)
    {
        if (\Auth::user()->isAbleTo('reset-password')) {
            $validator = \Validator::make(
                $request->all(),
                [
                    'password' => 'required|min:8'
                ],
                [
                    'password.required' => 'Silahkan masukkan Password Baru !',
                    'password.min' => 'Minimal Password 8 karakter !'
                ]
            );

            if ($validator->fails()) {
                $message = $validator->getMessageBag();
                return redirect()->back()->with('error', $message->first());
            }

            $password = bcrypt($request->password);
            DB::table('users')->where('id', '=', $id)->update(['password' => $password]);

            return redirect()->route($this->route.'index')->with('success', 'Password Berhasil diupdate !');;
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function profile()
    {
        if (\Auth::user()->isAbleTo('manage-account')) {
            $userDetail = $this->user();
            $profile = \Storage::url('public/avatar/');

            return view($this->view.'profile', compact('userDetail', 'profile'));
        } else {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function update_profile(Request $request)
    {
        try {
            $userDetail = $this->user();
            $user       = $this->model::findOrFail($userDetail['id']);

            $validator = \Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email,'.$userDetail['id'],
                ],
                [
                    'name.required' => 'Silahkan masukkan Nama Pengguna !',
                    'email.required' => 'Silahkan masukkan Email Pengguna !',
                    'email.unique' => 'Email sudah tersedia !',
                ]
            );

            if ($validator->fails()) {
                $message = $validator->getMessageBag();
                return redirect()->route($this->route.'profile')->with('error', $message->first());
            }

            if ($request->file('profile')) {
                if ($user->avatar && file_exists(storage_path('app/public/avatar/'.$user->avatar))) {
                    \Storage::delete('public/avatar/'.$user->avatar);
                }
                $uploadfile = $request->file('profile');
                $filename = $uploadfile->hashName();
                $uploadfile->store('avatar', 'public');
                $user['avatar'] = $filename;
            }
            $user['name']  = $request['name'];
            $user['email'] = $request['email'];
            $user->update();

            return redirect()->route('backend.home')->with('success', 'Profile Berhasil diupdate !');
        } catch (\Exception $err) {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function password_profile(Request $request)
    {
        try {
            if (Auth::Check()) {
                $validator = \Validator::make(
                    $request->all(),
                    [
                        'current_password' => 'required',
                        'new_password' => 'required|min:8',
                        'confirm_password' => 'required|same:new_password',
                    ],
                    [
                        'current_password.required' => 'Silahkan Masukkan Password Saat Ini !',
                        'new_password.required' => 'Silahkan Masukkan Password Baru !',
                        'new_password.min' => 'Minimal Password 8 karakter !',
                        'confirm_password.required' => 'Silahkan Konfirmasi Ulang Password Baru !',
                        'confirm_password.same' => 'Konfirmasi Password Baru tidak sesuai !',
                    ]
                );

                if ($validator->fails()) {
                    $message = $validator->getMessageBag();
                    return redirect()->route($this->route.'profile')->with('error', $message->first());
                }

                $objUser          = $this->user();
                $request_data     = $request->All();
                $current_password = $objUser->password;
                if (Hash::check($request_data['current_password'], $current_password)) {
                    $user_id            = $this->user()->id;
                    $obj_user           = $this->model::find($user_id);
                    $obj_user->password = bcrypt($request_data['new_password']);;
                    $obj_user->save();

                    return redirect()->route('backend.home')->with('success', 'Password Berhasil diupdate !');
                } else {
                    return redirect()->route($this->route.'profile')->with('error', 'Masukkan Password yang benar saat ini !');
                }
            } else {
                return redirect()->route('backend.home')->with('error', 'Something is wrong !');
            }
        } catch (\Exception $err) {
            return redirect()->back()->with('error', 'Permission denied.');
        }
    }

    public function get_user(Request $request)
    {
        $q = $request->q;

	if (!$q) {
            return response()->json([]);
        }

        $data = User::query()
            ->where('name', 'LIKE', '%' . $q . '%')
            ->orWhere('no_hp', 'LIKE', '%' . $q . '%')
            ->get();

        $items = [];

        foreach ($data as $item) {
            $items[] = [
                'id' => $item->id,
                'text' => $item->name . ' - ' . $item->no_hp
            ];
        }

        $allData = [
            'items' => $items
        ];

        return response()->json($allData);
    }
}
