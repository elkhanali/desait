<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{




    public function login()
    {
           
        if (auth()->check()) {
            return redirect()->route(route: 'admin.index');
        }
        return view('admin.auth.login');
    }
    public function loginCheck(AdminLoginRequest $request)
    {

        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], request()->has('remember_me'))) {
            auth()->user();
            return view('admin.index');
        } else {
            return redirect()->route('admin.login')->with(['type' => 'error', 'message' => 'User not found']);
        };

        
    }


    // public function loginCheck(AdminLoginRequest $request)
    // {
    //     $credentials = $request->only('email', 'password');
    //     $remember = $request->has('remember_me');

    //     if (Auth::attempt($credentials, $remember)) {
    //         return redirect()->route('admin.index'); // Başarılı giriş sonrasında yönlendir
    //     } else {
    //         return redirect()->route('admin.login')->with(['type' => 'error', 'message' => 'User not found']);
    //     }
    // }


    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }
}
