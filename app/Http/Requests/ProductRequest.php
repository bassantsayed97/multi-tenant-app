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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
           'name' =>'required|string',
           'price' =>'required|numeric',
           'user_id' =>'required|exists:users,id',
           'image' =>'required||image|mimes:jpg,png,jpeg',
        ];
    }

    public function messages()
    {
        return [
            'name' => 'Please Enter Product Name',
            'image' => 'Image Must Be Image Type',
            'price' => 'Please Enter Product Price',
            'user_id' => 'This User Doesnot Exists',
        ];
    }
}
