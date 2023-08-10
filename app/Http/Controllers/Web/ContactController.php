<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Http\Requests\web\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('web.contact.index');
    }

    public function post(Request $request)
    {
        $data = $request->only('name', 'email', 'phone', 'content');
        Contact::create($data);
        return redirect()->back()->with('success', 'Gửi thông tin liên hệ thành công!');
    }
}
