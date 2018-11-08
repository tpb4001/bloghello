<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article_pl extends Model
{
    public $table = 'article_pl';

    public function user()
    {
        return $this->hasOne('App\User','id','uid');
    }
}
