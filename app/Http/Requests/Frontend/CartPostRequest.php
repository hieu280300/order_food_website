<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class CartPostRequest extends FormRequest
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
            'diachi' => 'required|string',
            'name' => 'required|string',
            'sdt'=>'numeric|digits_between:10,11',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập :attribute !',
            'string' => ':attribute không hợp lệ! ',
            'numeric' => ':attribute không hợp lệ !',
            'digits_between' => ':attribute phải 10 hoặc 11 số !'
        ];
    }
    public function attributes()
    {
        return [
            'diachi' => 'Địa chỉ giao hàng',
            'name' => 'Tên người nhận',
            'sdt' => 'Số điện thoại',
        ];
    }
}
