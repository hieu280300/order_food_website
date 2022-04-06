<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class StoreShopRequest extends FormRequest
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
            'name' => 'required|min:5|max:255', // rule: not null, minumum: 5, maximum: 255
            'name_shop' => 'required|min:5|max:255', // rule: not null, minumum: 10
            'address_shop' => 'required',
            'image_shop'=> 'required',
            'email' => 'required',
            'password'=> 'required|min:8|max:255',
            'time_open'=> 'required',
            'time_close'=> 'required'
        ];
    }
}
