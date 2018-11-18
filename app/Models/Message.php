<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $table = 'Message';

    public function huifu()
    {
        return $this->hasOne('App\Models\Message_hf','id','mid');
    }
    public function user_name()
    {
        return $this->hasOne('App\User','id','uid');
    }
}
