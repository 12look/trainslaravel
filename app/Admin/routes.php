<?php

Route::get('', [
	'as' => 'admin.home',
	function ()
	{
		$content = 'Приветствую, Админ';
		return Admin::view($content, 'Главная');
	}
]);

Route::get('/tik', function ()
{
	$display = Admin::model('App\Ticket')->display();
	$content = view('ticket', compact('display'));
	return Admin::view($content, 'Билеты');
});