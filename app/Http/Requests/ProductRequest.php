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
        $rules = [
            'code' => 'required|min:3|max:255|unique:products,code',
            'name' => 'required|min:3|max:255',
            'category_id' => 'required',
            'description' => 'required|min:5',
            'price' => 'required|numeric|min:1',
            'count' => 'required|numeric|min:0',
        ];
        if ($this->route()->named('products.update')) {
            $rules['code'] .= ',' . $this->route()->parameter('product')->id;
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'required' => 'Поле :attribute необходимо заповнити!',
            'min' =>
                'Склад поля :attribute не повинен бути менше :min літер.',
            'max' =>
                'Склад поля :attribute не повинен бути більше :max символов.',
            'unique' =>
                'Найменування :attribute заняте, подберіть інше унікальне найменування.',
        ];
    }
}
