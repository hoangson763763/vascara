<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|max:255|unique:categories',
            'code' => 'required'
        ];
    }

    // public function messages(){
    //     return [
    //         'name.required' => 'Tên danh mục không được để trống',
    //         'name.max' => 'Tên danh mục không được quá 255 ký tự',
    //         'name.unique' => 'Tên danh mục đã tồn tại'
    //     ];
    // }
}
