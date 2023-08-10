<?php

namespace App\Http\Requests\Web;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' =>  'required',
            'email' => 'email|required|unique:users',
            'phone' => 'required',
            'address' => 'required',
            'password' => 'required|min:6',
            're_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống!',
            'email.required' => 'Email không được để trống!',
            'email.email' => 'Email chưa đúng định dạng!',
            'email.unique' => 'Email đã tồn tại!',
            'phone.required' => 'Số điện thoại không được để trống!',
            'address.required' => 'Số điện thoại không được để trống!',
            'password.required' => 'Mật khẩu không được để trống!',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự!',
            're_password.required' => 'Nhập lại mật khẩu không được để trống!',
            're_password.same' => 'Nhập lại mật khẩu không khớp',
        ];
    }
}
