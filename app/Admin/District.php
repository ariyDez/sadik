<?php

Admin::model('App\District')->title('Районы')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('title')->label('Title'),
		Column::image('image')->label('Image'),
		Column::string('info')->label('Info'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('title', 'Title'),
		FormItem::text('info', 'Info'),
		FormItem::image('image', 'Image'),
	]);
	return $form;
});