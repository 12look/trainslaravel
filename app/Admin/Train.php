<?php
Admin::model(\App\Train::class)->title('Поезда')->display(function ()
{
    $display = AdminDisplay::table();
    $display->with('dispatch_station', 'arrival_station');
    $display->columns([
        Column::string('number')->label('Номер поезда'),
        Column::datetime('dispatch_time')->label('Время отправления')->format('d.m.Y H:i'),
        Column::datetime('arrival_time')->label('Время прибытия')->format('d.m.Y H:i'),
        Column::string('dispatch_station.name')->label('Станция отправления'),
        Column::string('arrival_station.name')->label('Станция прибытия')
    ]);
    return $display;
})->createAndEdit(function ()
{
    $form = AdminForm::form();

    $form->items([
		FormItem::text('number', 'Номер поезда')->required(),
		FormItem::date('dispatch_time', 'Дата отправления')->format('d.m.Y H:i')->required(),
		FormItem::date('arrival_time', 'Дата прибытия')->format('d.m.Y H:i')->required(),
		FormItem::select('dispatch_station_id', 'Станция отправления')->model('App\Station')->display('name')->required(),
		FormItem::select('arrival_station_id', 'Станция прибытия')->model('App\Station')->display('name')->required()
	]);
    return $form;
})->delete();