<?php
Admin::model(\App\Place::class)->title('Места')->display(function ()
{
    $display = AdminDisplay::table();
    $display->with('wagon');
    $display->columns([
        Column::string('number')->label('Номер места'),
        Column::string('type')->label('Тип'),
        Column::string('wagon.number')->label('Номер вагона'),
        Column::string('wagon.train.number')->label('Номер поезда'),
        Column::string('is_free')->label('Свободно ли'),
        Column::string('coast')->label('Цена')
    ]);
    return $display;
})->createAndEdit(function ()
{
    $form = AdminForm::form();

    $form->items([
		FormItem::text('number', 'Номер места')->required(),
		FormItem::select('type', 'Тип')->enum(['нижнее', 'верхнее'])->required(),
		FormItem::select('wagon_id', 'Вагон')->model('App\Wagon')->display('id')->required(),
        FormItem::text('coast', 'Цена')->required()
	]);
    return $form;
})->delete();