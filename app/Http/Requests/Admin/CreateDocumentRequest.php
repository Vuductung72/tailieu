<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateDocumentRequest extends FormRequest
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
            'code' => 'required|unique:documents',
            'id_category' =>  'required',
            'author' =>  'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp',

        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Mã tài liệu là trường bắt buộc nhập',
            'code.unique' => 'Mã tài liệu đã tồn tại',
            'id_category.required' => 'Danh mục là trường bắt buộc nhập',
            'author.required' => 'Tên tác giả là trường bắt buộc nhập',
            'image.required' => 'Hình ảnh là trường bắt buộc nhập',
            'image.mimes' => 'Hình ảnh không đúng định dạng jpeg,png,jpg,gif,svg',
        ];
    }
}
