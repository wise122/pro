<?php

namespace App\Http\Controllers\Frontend;

use App\Events\ForgotPasswordEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Jobs\SendForgotPasswordJob;
use App\Jobs\SendForgotPasswordLink;
use App\Models\PermissionRole;
use App\Models\Role;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $url;
    protected $client;

    public function __construct()
    {
        $this->url = config('whatsapp.WA_POST_ENDPOINT');
        $this->client = new Client();
    }

    public function showLoginForm()
    {
        if (Auth::check()) {
            return Redirect::route('frontend.index');
        } else {
            if (!session()->has('url.intended')) {
                Session::forget('url.intended');
                session(['url.intended' => url()->previous()]);
            }

            $role = DB::table('roles')->whereNotIn('name', ['admin'])->orderBy('name', 'asc')->pluck('name', 'id')->toArray();

            return view('frontend.auth.login', compact('role'));
        }
    }

    public function showRegisterForm()
    {
        if (Auth::check()) {
            return Redirect::route('frontend.index');
        } else {
            if (!session()->has('url.intended')) {
                Session::forget('url.intended');
                session(['url.intended' => url()->previous()]);
            }

            $role = DB::table('roles')->whereNotIn('name', ['admin'])->orderBy('name', 'asc')->pluck('name', 'id')->toArray();

            return view('frontend.auth.register', compact('role'));
        }
    }

    public function login(LoginRequest $request)
    {
        $status = false;
        try {
            $credentials = [
                'no_hp' => $request['no_telp'],
                'password' => $request['pswd'],
            ];

            if (!Auth::attempt($credentials)) {
                throw new \Exception(__('auth.wrong_username'));
            }

            $status = true;
            $data['url'] = (session('url.intended') != null) ? session('url.intended') : route('frontend.index');
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

    public function register(RegisterRequest $request)
    {
        try {
            $randomNumber = random_int(1000, 9999);
            $user = new User();
            $user->name = $request->name;
            $user->email = str_replace(' ', '', strtolower($request->name)) . $randomNumber . '@propaktani.com';
            $user->password = bcrypt($request->pswd);
            $user->no_hp = $request->no_telepon;
            $user->save();

            $role = Role::where('id', $request->roles)->first();
            $permission = PermissionRole::where('role_id', $request->roles)->get();
            $userfind = User::find($user->id);

            foreach ($permission as $row) {
                $userfind->attachPermission($row->permission_id);
            }

            $user->attachRole($role->name);

            Auth::login($user);

            $data['url'] = route('frontend.index');

            $response = [
                'status' => true,
                'data' => $data
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            $data['message'] = $e->getMessage();
            $response = [
                'status' => false,
                'data' => $data
            ];
            return response()->json($response);
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect::route('frontend.index');
    }

    public function forgetPassword()
    {
        return view('frontend.auth.forget-password');
    }

    public function forgetPasswordSubmit(Request $request)
    {
        $token = Str::random(64);

        $idNumber = substr($request->phone, 0, 1) == '0' ? '62' . substr($request->phone, 1) : $request->phone;
        $localNumber = $request->phone;

        $randomSecond = random_int(3, 5);

        $checkUser = User::where('no_hp', $localNumber)->first();

        if (!$checkUser) {
            $response = [
                'status' => true,
                'data' => [
                    'message' => __('frontend.login.send_forgot_pass')
                ]
            ];

            return response()->json($response, 429);
        }

        $checkToken = DB::table('password_resets')->where('phone', $localNumber)->latest()->first();

        if ($checkToken) {
            $created_at = strtotime($checkToken->created_at);
            $now = strtotime(date('Y-m-d H:i:s'));
            $diff = $now - $created_at;

            if ($diff < 120) {
                $data['message'] = __('frontend.login.send_forgot_pass_attempt');

                $response = [
                    'status' => false,
                    'data' => $data
                ];

                return response()->json($response);
            }
        }

        $link = "Klik link berikut untuk mereset password anda " . route('frontend.reset-password', $token);

        dispatch(new SendForgotPasswordJob($idNumber, $link))->delay(now()->addSeconds($randomSecond));

        DB::table('password_resets')->insert(
            [
                'phone' => $request->phone,
                'token' => $token,
                'created_at' => date('Y-m-d H:i:s')
            ]
        );

        $data['message'] = __('frontend.login.send_forgot_pass');

        $response = [
            'status' => true,
            'data' => $data
        ];

        return response()->json($response);
    }

    public function resetPasswordForm($token)
    {
        $checkToken = DB::table('password_resets')->where('token', $token)->first();
        if ($checkToken) {
            return view('frontend.auth.reset-password', compact('checkToken'));
        } else {
            return Redirect::route('frontend.index');
        }
    }

    public function resetPasswordSubmit(Request $request)
    {
        $status = false;
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'pswd' => 'required|min:8',
                    'confirm_pswd' => 'required|same:pswd',
                ],
                [
                    'pswd.required' => __('frontend.login.pass_required'),
                    'pswd.min' => __('frontend.login.pass_min'),
                    'confirm_pswd.required' => __('frontend.login.confirm_pass_required'),
                    'confirm_pswd.same' => __('frontend.login.confirm_pass'),
                ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                throw new \Exception($messages->first());
            }

            $checkToken = DB::table('password_resets')
                ->where([
                    'phone' => $request->phone,
                    'token' => $request->token,
                ])
                ->first();

            User::where('no_hp', $checkToken->phone)->update(
                [
                    'password' => bcrypt($request->pswd)
                ]
            );

            DB::table('password_resets')->where(['phone' => $request->phone])->delete();

            $status = true;
            $data['message'] = __('frontend.login.reset_pass_success');
            $data['url'] = route('frontend.login');
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
    }
}
