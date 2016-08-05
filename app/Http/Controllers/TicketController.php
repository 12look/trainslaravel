<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function buy(Request $request)
    {
    	if (($place = \App\Place::find($request->place)) && $place->is_free)
    	{
    		$wagon = $place->wagon;
    		$train = $wagon->train;

	    	$ticket = new \App\Ticket;
	    	$ticket->user_id = \Auth::id();
	    	$ticket->place_id = $request->place;
	    	$ticket->wagon_id = $place->wagon->id;
	    	$ticket->train_id = $wagon->train->id;

			$rules = [
		        'place'    => 'required|exists:places,id'
		    ];
	    	
	    	$validator = Validator::make($request->all(), $rules);

	    	if ($validator->fails()) {
	            return view('ticket.complete', compact('validator'));
	        } else {
				$ticket->save();
				$place->is_free = 0;
				$place->save();

				return view('ticket.complete', compact('ticket'));
			}
    	}
    }
}
