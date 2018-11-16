<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
   public $table = 'notices';

   // 一对一用户表
   public function user()
   {
       return $this->hasOne('App\User','id','uid');
   }
}

