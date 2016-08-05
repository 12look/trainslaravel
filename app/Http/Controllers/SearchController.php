<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function resultTrains(Request $request)
    {
        $start = new \DateTime($request->when);
        $end = new \DateTime($request->when);
        $end->modify('+1 day -1 second');
        
        $station1 = \App\Station::where('name', $request->from)->first();
        $station2 = \App\Station::where('name', $request->to)->first();
        if ($station1 != null && $station2 != null)
        {
            $trains = \App\Train::where(['dispatch_station_id' => $station1->id, 'arrival_station_id' => $station2->id])->whereBetween('dispatch_time', [$start, $end])->get();
        }

        $from = $request->from;
        $to = $request->to;
        return view('search.trains', compact('trains', 'from', 'to'));
    }

    public function resultPlaces(Request $request)
    {
        $wagons = \App\Wagon::with(['places' => function($q)
            {
                $q->where('is_free', 1);
            }])->where('train_id', $request->train)->whereHas('places', function($q)
            {
                $q->where('is_free', 1);
            })->get();
        return view('search.places', compact('wagons'));
    }
}
