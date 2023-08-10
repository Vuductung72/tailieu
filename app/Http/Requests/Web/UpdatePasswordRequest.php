<?php

namespace App\Http\Requests\web;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
            'password' => 'required|min:6',
            're_password' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'Số điện thoại không được để trống!',
            'password.required' => 'Mật khẩu không được để trống!',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự!',
            're_password.required' => 'Nhập lại mật khẩu không được để trống!',
            're_password.same' => 'Nhập lại mật khẩu không khớp',
        ];
    }
}
