<?php

namespace App\Http\Controllers;

use App\Models\Account;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class AccountController extends Controller
{
    public function login()
    {
        return view('customer.login');
    }

    public function post_login(Request $request)
    {
        $check = Auth::guard('account')-> attempt($request->only('email','password'),$request->has('remember'));

        if($check)
        {
            return redirect()->route('home.index');
        }
        return redirect()->back()->with('error','Tài khoản hoặc mật khẩu không chính xác');

        dd($request->all());
    }


    // GET 


    public function register()
    {
        return view('customer.register');
    }

    // POST


    public function post_register(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'address' => 'required',
                'password' => 'required',
                'confirm_password' => 'required|same:password'

            ],
            [
                'name.required' => 'Họ và tên không được để trống',
                'email.required' => 'Email không được để trống',
                'phone.required' => 'Số điện thoại không được để trống',
                'password.required' => 'Mật khẩu không được để trống',
                'confirm_password.required' => 'Nhập lại mật khẩu không được để trống',
            ]
        );
        
        Account :: create([

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => bcrypt($request->password)

        ]);

        return redirect() -> route('home.index');

    }

    public function profile()
    {
        return view('customer.profile');
    }

    public function post_profile()
    {

    }

    public function logout()
    {
        $check = Auth::guard('account')->logout();

        return redirect() -> route('home.index');
    }
}
