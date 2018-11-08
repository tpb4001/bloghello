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
    	return $this->hasOne('App\User','id','bid');
    }

    public function getT()
    {
        return $this->hasOne('App\Models\Article','id','aid');
    }
    public function getTinfo()
    {
    	return $this->hasOne('App\Models\Articleinfo','aid','aid');
    }
}
