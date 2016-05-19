<?php

Route::get('', [
	'as' => 'admin.home',
	function ()
	{
		$content = 'Define your dashboard here. '.Sentinel::getUser();
		return Admin::view($content, 'Dashboard');
	}
]);
