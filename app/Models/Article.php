<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $table = 'articles';

    public function articleinfo()
    {
        return $this->hasOne('App\Models\Articleinfo','aid');
    }
    public function article_pl()
    {
        return $this->hasOne('App\Models\Article_pl','aid');
    }
    public function cates()
    {
        return $this->hasOne('App\Models\Cates','id','cid');
    }
    public function abc()
    {
        return $this->hasOne('App\User','id','uid');
    }
    
}
