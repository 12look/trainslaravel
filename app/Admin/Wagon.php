<?php
Admin::model(\App\Wagon::class)->title('Вагоны')->display(function ()
{
    $display = AdminDisplay::table();
    $display->with('train');
    $display->columns([
        Column::string('number')->label('Номер вагона'),
        Column::string('type')->label('Тип'),
        Column::string('train.id')->label('Поезд')
    ]);
    return $display;
})->createAndEdit(function ()
{
    $form = AdminForm::form();

    $form->items([
		FormItem::text('number', 'Номер вагона')->required(),
		FormItem::select('type', 'Тип')->enum(['св', 'купэ', 'плацкарт'])->required(),
		FormItem::select('train_id', 'Поезд')->model('App\Train')->display('id')->required()
	]);
    return $form;
})->delete();