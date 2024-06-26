<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use View, Auth;

class LoginController extends Controller
{
    protected $title      = 'Signin';
    protected $view       = 'backend.';
    protected $route      = 'backend.';

    public function __construct()
    {
        View::share('title', $this->title);
        View::share('view', $this->view);
        View::share('route', $this->route);
    }

    protected function user(){
        return Auth::user();
    }

    public function showLoginForm(){
        if (Auth::user()) {
            $user = User::find(auth()->user()->id);
            if ($user->hasRole('admin')) {
                return redirect()->route($this->route.'home');
            } else {
                return redirect()->route('frontend.home')->with('error', 'Akun Anda diblokir, silakan hubungi Administrator');
            }
        } else {
            $logo = \Storage::url('logo/');

            return view($this->view.'login', compact('logo'));
        }
    }

    public function login(Request $request)
    {
        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];

        if(Auth::attempt($credentials)) {
            return redirect()->route($this->route.'home');
        }
        return redirect()->back()->with('error', 'Email atau Password Salah !');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('frontend.home');
    }
}
