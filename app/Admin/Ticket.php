<?php
Admin::model(\App\Ticket::class)->title('Билеты')->display(function ()
{
    $display = AdminDisplay::datatables();
    $display->with('user', 'train', 'wagon', 'place');
    $display->filters([
		Filter::custom('wagon_id')->callback(function ($query, $parameter)
		{
			if($parameter)
		    	$query->whereHas('wagon', function($q) use ($parameter)
	            {
	                $q->where('number', $parameter);
	            });
		}),
		Filter::custom('train_id')->callback(function ($query, $parameter)
		{
			if($parameter)
		    	$query->whereHas('train', function($q) use ($parameter)
	            {
	                $q->where('number', $parameter);
	            });
		}),
		Filter::custom('place_id')->callback(function ($query, $parameter)
		{
			if($parameter)
		    	$query->whereHas('place', function($q) use ($parameter)
	            {
	                $q->where('number', $parameter);
	            });
		}),
		// Filter::custom('from')->callback(function ($query, $parameter)
		// {
		// 	if($parameter)
		//     	$query->whereHas('train', function($q) use ($parameter)
	 //            {
	 //                $q->where('dispatch_time', '>', new DateTime(''));
	 //            });
		// })
	]);
    $display->columns([
        Column::string('user.name')->label('Имя заказчика'),
        Column::string('train.number')->label('№ поезда'),
        Column::string('wagon.number')->label('№ вагона'),
        Column::string('place.number')->label('№ места'),
        Column::datetime('created_at')->label('Дата приобретения')->format('d.m.Y H:i'),
    ]);

    $display->columnFilters([
		null,
		ColumnFilter::text()->placeholder('Номер поезда'),
		ColumnFilter::text()->placeholder('Номер вагона'),
		null,
		ColumnFilter::range()->from(
			ColumnFilter::date()->placeholder('От')->format('d.m.Y H:i')
		)->to(
			ColumnFilter::date()->placeholder('До')->format('d.m.Y H:i')
		)
	]);
    return $display;
})->createAndEdit(function ()
{
    return null;
})->delete();