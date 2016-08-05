<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
	public $timestamps = false;

	public static function boot()
    {
        static::creating(function ($model) {
            $model->created_at = $model->freshTimestamp();
        });
    }

    public function user()
	{
	    return $this->belongsTo('App\User');
	}
	public function train()
	{
	    return $this->belongsTo('App\Train');
	}
	public function wagon()
	{
	    return $this->belongsTo('App\Wagon');
	}
	public function place()
	{
	    return $this->belongsTo('App\Place');
	}
}
