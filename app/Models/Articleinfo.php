<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articleinfo extends Model
{
    public $table = 'articleinfo';
    // 一对一 文章表
    public function art()
    {
        return $this->belongsTo('App\Models\Article','aid','id');
    }
}
