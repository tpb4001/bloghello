<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    // 数据库表
    public $table = 'report';
    // 一对一关联 文章表
    public function getT()
    {
        return $this->hasOne('App\Models\Article','id','tid');
    }
}
