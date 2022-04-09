<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PHPUnit\Framework\Constraint\IsTrue;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
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
            'quantity'=>'required',
            'content' => 'required|min:10',
            'money'=>'required',// 
            'slug'=>'required',
             'code'=>'required',
        ];
    }
}
