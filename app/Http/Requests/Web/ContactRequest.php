<?php

namespace App\Http\Requests\web;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email' => 'email|required',
            'phone' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống!',
            'email.required' => 'Email không được để trống!',
            'email.email' => 'Email chưa đúng định dạng!',
            'phone.required' => 'Số điện thoại không được để trống!',
            'content.required' => 'Ghi chú không được để trống!',
        ];
    }
}
