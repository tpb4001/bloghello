<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fans extends Model
{
	function fan()
	{
    return $this->belongsTo('App\Models\Fans','fan_id');
    }
    function fanuser()
	{
    return $this->belongsTo('App\User','fan_id');
    }
}
