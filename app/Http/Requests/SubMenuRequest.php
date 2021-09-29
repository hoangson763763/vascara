<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubMenuRequest extends FormRequest
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
            'name' => 'required|max:255,unique:sub_menus',
            'menu' => 'required'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Chưa nhập tên sub menu',
            'name.mãx' => 'Tên sub menu không được quá 255 ký tự',
            'name.unique' => 'Sub  menu này đã tồn tại',
            'menu.required' => 'Bạn chưa chọn menu cha'
        ]
    }
}
