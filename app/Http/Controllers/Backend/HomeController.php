<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (\Auth::user()) {
            $user = User::find(auth()->user()->id);
            if ($user->hasRole('admin')) {
                return view('backend.home');
            } else {
                return redirect()->route('frontend.index')->with('error', 'Akun Anda diblokir, silakan hubungi Administrator');
            }
        } else {
            return redirect()->route('frontend.index');
        }
    }
}
