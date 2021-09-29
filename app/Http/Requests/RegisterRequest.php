<?php

namespace App\Http\Requests;

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
            'email' => 'required|max:100|unique:users',
            'username' => 'required|max:50',
            'phone' => 'required|max:10',
            'password' => 'required|max:50|min:8',
            're-pass' => 'required|same:password'
        ];
    }

    public function messages(){
        return [
            'email.required' => 'Email không được để trống',
            'username.required' => 'Tên người dùng không được để trống',
            'password.required' => 'Mật khẩu không được để trống',
            'phone.required' => 'Phone number không được để trống',
            're-pass.required' => 'Nhập lại mật khẩu không được để trống',
            'email.max' => 'Email không được quá 100 ký tự',
            'username.max' => 'Tên người dùng không được quá 50 ký tự',
            'phone.max' => 'Số điện thoại không hợp lệ',
            'password.max' => 'Mật khẩu không được quá 100 ký tự',
            'email.unique' => 'Email đã tồn tại',
            're-pass.same' => 'Mật khẩu không trùng khớp',
            'password.min' => 'Mật khẩu phải nhiều hơn 8 ký tự'
        ];
        
    }
}
