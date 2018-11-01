<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    public $table = 'report';

    public function getUser()
    {
    	return $this->hasOne('App\User','id','uid');
    }

    public function getB()
    {
    	return $this->hasOne('App\User','id','tid');
    }

    public function getT()
    {
    	return $this->hasOne('App\Models\Tags','id','tid');
    }
}
