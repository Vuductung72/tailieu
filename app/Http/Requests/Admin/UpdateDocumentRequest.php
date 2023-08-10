<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
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
            'code' => 'required',
            'id_category' =>  'required',
            'author' =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Mã tài liệu là trường bắt buộc nhập',
            'id_category.required' => 'Danh mục là trường bắt buộc nhập',
            'author.required' => 'Tên tác giả là trường bắt buộc nhập',
        ];
    }
}
