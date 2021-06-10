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
            'name' => 'required',
            'price' => 'required|numeric',
            'discription' => 'required',
            'status' => 'required|numeric|min:10|max:100',
        ];
    }

    public function messages()
    {
        return [
      
            'status.min' => 'sai định dạng (10 - 100)',
            'status.max' => "sai định dạng (10 - 100)",
            'name.required' => 'không để trống',
        ];
    }
}
