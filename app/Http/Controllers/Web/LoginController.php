<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\LoginRequest;
use App\Http\Requests\Web\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function postLogin(LoginRequest $request)
    {
        $login = $request->only('email', 'password');

        if (Auth::guard('user')->attempt($login)) {
            session()->flash('success', 'Đăng nhập thành công!');
            return redirect()->back();
        } else{
            session()->flash('error', 'Email hoặc Mật khẩu không chính xác!');
            return redirect()->back();
        }
    }

    public function register()
    {
        if (Auth::guard('user')->check()) {
            session()->flash('info', 'Bạn đã đăng nhập!');
            return redirect()->back();
        }
        return view('web.login.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        $data = $request->only('name', 'email', 'phone', 'address', 'gender');
        $data['password'] = Hash::make($request->password);
        // dd($data);
        User::create($data);
        $login = $request->only('email', 'password');
        if (Auth::guard('user')->attempt($login)) {
            return redirect()->route('w.home')->with('success', 'Đăng kí tài khoản thành công!');
        }
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('w.home')->with('success', 'Đăng xuất tài khoản thành công!');
    }
}
