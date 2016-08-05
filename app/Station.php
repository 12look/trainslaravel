<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    public $timestamps = false;

    public function dispatches()
	{
	    return $this->hasMany('App\Train', 'dispatch_station_id');
	}

    public function arrivals()
	{
	    return $this->hasMany('App\Train', 'arrival_station_id');
	}
}
