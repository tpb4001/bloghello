<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersStoreRequest extends Request
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
            'uname' => 'required|unique:users|regex:/^[\w]{8,16}$/',
            'upass' => 'required|regex:/^[\S]{6,20}$/',
            'repass' => 'required|same:upass',
            'phone' => 'required|regex:/^1{1}[345678]{1}[\d]{9}$/',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'uname.required' => '用户名必填',
            'uname.regex' => '用户名格式错误',
            'uname.unique' => '用户已存在',
            'upass.required' => '密码必填',
            'upass.regex' => '密码格式错误',
            'repass.required' => '确认密码必填',
            'repass.same' => '两次密码不一致',
            'phone.required' => '手机号必填',
            'phone.regex' => '手机号格式错误',
            'email.required' => '邮箱必填', 
            'email.email' => '邮箱格式错误',
        ];
    }
}
