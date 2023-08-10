<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class RuleRequest extends FormRequest
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
            'name' => 'required',
            'type' => 'required',
            'content' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên bài viết là trường bắt buộc nhập',
            'type.required' => 'Dạng bài viết là trường bắt buộc nhập',
            'content.required' => 'Nội dung bài viết là trường bắt buộc nhập',
        ];
    }
}
