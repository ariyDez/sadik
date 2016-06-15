<?php

Admin::model('App\Movie')->title('Видео')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('title')->label('Title'),
		Column::string('href')->label('Href'),
		Column::image('image')->label('Image'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('title', 'Title')->required(),
		FormItem::text('href', 'Href')->required()->unique(),
		FormItem::image('image', 'Image'),
		FormItem::select('category_id')->model('App\MovieCategory')->label('Категория')->required(),
	]);
	return $form;
});