<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name' => 'required|min:5|max:255', // rule: not null, minumum: 5, maximum: 255
            'description' => 'required|min:10', // rule: not null, minumum: 10
            'category_id' => 'required', 
            'quantity'=>'required',
            'content' => 'required|min:10',
            'money'=>'required',// 
        ];
    }
}
