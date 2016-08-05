<?php
Admin::model(\App\Station::class)->title('Станции')->display(function ()
{
    $display = AdminDisplay::table();
    $display->columns([
        Column::string('name')->label('Название')
    ]);
    return $display;
})->createAndEdit(function ()
{
    $form = AdminForm::form();

    $form->items([
		FormItem::text('name', 'Название')->required()
	]);
    return $form;
})->delete(null);