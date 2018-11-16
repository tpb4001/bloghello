<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message_hf extends Model
{
    public $table = 'message_hf';
    public function user_name()
    {
        return $this->hasOne('App\User','id','uid');
    }
}
