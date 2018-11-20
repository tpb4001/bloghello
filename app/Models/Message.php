<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public $table = 'message';

    public function huifu()
    {
        return $this->hasOne('App\Models\Message_hf','id','mid');
    }
    public function user_name()
    {
        return $this->belongsTo('App\User','uid');
    }
}
