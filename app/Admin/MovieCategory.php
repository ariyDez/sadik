<?php

Admin::model('\App\MovieCategory')->title('Категория')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('title')->label('Title'),
		Column::string('slug')->label('Slug'),
		Column::image('image')->label('Image'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('title')->label('Заголовок'),
		FormItem::text('slug')->label('Slug'),
		FormItem::image('image')->label('Картинка')
	]);
	return $form;
});