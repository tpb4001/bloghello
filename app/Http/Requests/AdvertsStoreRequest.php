<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdvertsStoreRequest extends Request
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
            'aname' => 'required',
            'url' => 'required',
            'image' => 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'aname.required' => '广告名必填',
            'url.required' => '广告路径必填',
            'image.required' => '广告图片必填',
           
        ];
    }
}
