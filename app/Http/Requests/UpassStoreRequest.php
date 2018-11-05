<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpassStoreRequest extends Request
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
            'upass' => 'regex:/^[\S]{6,20}$/',
            'upass' => 'regex:/^[\S]{6,20}$/',
            'repass' => 'same:upass',
            'phone' => 'regex:/^1{1}[345678]{1}[\d]{9}$/',
            'email' => 'email',
        ];
    }

    public function messages()
    {
        return [
            'upass.regex' => '密码格式错误',
            'repass.same' => '两次密码不一致',
            'phone.regex' => '手机号格式错误',
            'email.email' => '邮箱格式错误',
        ];
    }
}
