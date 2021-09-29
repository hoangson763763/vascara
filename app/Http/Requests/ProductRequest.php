<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|max:255',
            'title' => 'required|unique:products',
            'cate' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required',
            'content' => 'required',
            'feature_image' => 'required',
            'special_image' => 'required',
            'color' => 'required',
            'size'=> 'required',
            'code' => 'required'
        ];
    }

    
}
