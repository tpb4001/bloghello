<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article_pl extends Model
{
    public $table = 'article_pl';
    // 一对一用户表
    public function user()
    {
        return $this->hasOne('App\User','id','uid');
    }
    // 一对一文章表
    public function art()
    {
        return $this->hasOne('App\Models\Article','id','aid');
    }
}
