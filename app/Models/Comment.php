<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = 'comment';

    public function abc()
    {
        return $this->hasOne('App\User','id','uid');
    }
}
