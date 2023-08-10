<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\web\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function index()
    {
        return view('web.account.index');
    }

    public function update(Request $request, User $user)
    {
        $data = $request->only('name', 'address', 'phone', 'gender');
        $user->update($data);
        return redirect()->back()->with('success', 'Cập nhật tài khoản thành công!');
    }

    public function pasword()
    {
        return view('web.account.password');
    }

    public function updatePassword(UpdatePasswordRequest $request, User $user)
    {
        $data['password'] = Hash::make($request->password);
        $user->update($data);
        return redirect()->back()->with('success', 'Thay đổi mật khẩu thành công!');
    }
}
