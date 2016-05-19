<?php

Admin::model('App\Teacher')->title('Учителя')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);

	// если не администратор, то скрыть учителей, которые не относятся к садикам данного пользователя
	if(!Sentinel::inRole('admin'))
		$display->apply(function($query){
			$query->whereIn('garden_id', \App\User::find(Sentinel::getUser()->id)->gardens->lists('id')->toArray());
		});

	$display->columns([
		Column::string('name')->label('Имя'),
		Column::string('position')->label('Должность'),
		Column::image('image')->label('Картинка'),
		Column::string('garden.title')->label('Садик')
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	if(Sentinel::inRole('admin'))
		$form->items([
			FormItem::text('name', 'Name'),
			FormItem::text('position', 'Position'),
			FormItem::image('image', 'Image'),
			FormItem::select('garden_id', "Садик")->model('App\Garden')->display('title'),
		]);
	else
		$form->items([
			FormItem::text('name', 'Name'),
			FormItem::text('position', 'Position'),
			FormItem::image('image', 'Image'),
			// кастомный FormItem, который отбирает учитилей относящиеся к садикам только данного пользователя
			FormItem::selection('garden_id')->model('App\Garden')->user(\App\User::find(Sentinel::getUser()->id))->display('title'),
		]);
	return $form;
});