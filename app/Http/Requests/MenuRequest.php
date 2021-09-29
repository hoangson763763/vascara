<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'name' => 'required|max:255|unique:menus',
            'slug' => 'required|max:255|unique:menus'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Chưa nhập tên Menu',
            'name.unique' => 'Tên Menu đã tồn tại',
            'name.max' => 'Tên Menu không được quá 255 ký tự',
            'slug.required' => 'Chưa nhập slug',
            'slug.unique' => 'slug đã tồn tại',
            'slug.max' => 'slug không được quá 255 ký tự',
        ];
    }
}
