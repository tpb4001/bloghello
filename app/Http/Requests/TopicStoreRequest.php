<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TopicStoreRequest extends Request
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
            'title' => 'required',
            'content' => 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '话题标题必填',
            'content.required' => '话题内容必填',
           
        ];
    }
}
