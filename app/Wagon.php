<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wagon extends Model
{
	public $timestamps = false;
    
    public function train()
	{
	    return $this->belongsTo('App\Train');
	}

	public function places()
	{
	    return $this->hasMany('App\Place');
	}
}
