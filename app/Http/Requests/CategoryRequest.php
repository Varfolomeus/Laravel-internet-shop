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
        $rules = [
            'code' => 'required|min:3|max:255|unique:categories,code',
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:5',
        ];
        if ($this->route()->named('categories.update')) {
            $rules['code'] .= ',' . $this->route()->parameter('category')->id;
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
