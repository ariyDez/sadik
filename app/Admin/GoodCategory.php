<?php

Admin::model('App\GoodCategory')->title('Категории товаров')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('title')->label('Title'),
		Column::string('slug')->label('Slug'),
		Column::image('image')->label('Картинка')
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('title', 'Title')->required(),
		FormItem::text('slug', 'Slug')->required()->unique(),
		FormItem::image('image', 'Image'),
	]);
	return $form;
});