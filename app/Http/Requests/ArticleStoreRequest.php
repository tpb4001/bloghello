<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleStoreRequest extends Request
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
            'auth' => 'required',
            'copyform' => 'required',
            'article' => 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '文章标题必填',
            'auth.required' => '文章作者必填',
            'copyform.required' => '文章来源必填',
            'article.required' => '文章内容必填',
           
        ];
    }
}
