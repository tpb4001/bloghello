<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $table = 'articles';
    // 一对一文章详情表
    public function articleinfo()
    {
        return $this->hasOne('App\Models\Articleinfo','aid');
    }
    // 一对一文章评论表
    public function article_pl()
    {
        return $this->hasOne('App\Models\Article_pl','aid');
    }
    // 一对一类别表
    public function cates()
    {
        return $this->hasOne('App\Models\Cates','id','cid');
    }
    // 一对一用户表
    public function abc()
    {
        return $this->hasOne('App\User','id','uid');
    }
    
}
