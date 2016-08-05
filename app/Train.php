<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    public $timestamps = false;

    public function dispatch_station()
	{
	    return $this->belongsTo('App\Station', 'dispatch_station_id');
	}

    public function arrival_station()
	{
	    return $this->belongsTo('App\Station', 'arrival_station_id');
	}

    public function wagons()
    {
    	return $this->hasMany('App\Wagon');
    }
}
