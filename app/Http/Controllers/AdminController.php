<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function login()
    {
        return view('admin.login');
    }

    public function post_login(Request $request)
    {
        $check = Auth::attempt($request->only('email','password'),$request->has('remember'));

        if($check)
        {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with('error','Tài khoản hoặc mật khẩu không chính xác');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
