<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public $table = 'topic';

    public function comment()
    {
        return $this->hasOne('App\Models\Comment','id','tid');
    }

    public function abc()
    {
        return $this->hasOne('App\User','id','uid');
    }

    public function getComment()
    {
    	//zheli guanli shang le ma 

    	return $this->hasMany(Comment::class,'tid','id');
    }
}
