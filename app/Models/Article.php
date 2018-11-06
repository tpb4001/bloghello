<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $title = 'articles';

    public function articleinfo()
    {
        return $this->hasOne('App\Models\Articleinfo','aid');
    }
    public function abc()
    {
        return $this->hasOne('App\User','id','uid');
    }
    
}
