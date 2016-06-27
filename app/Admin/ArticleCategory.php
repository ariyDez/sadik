<?php

Admin::model('App\ArticleCategory')->title('Категория')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('title')->label('Заголовок'),
		Column::string('slug')->label('Слаг'),
		Column::image('image')->label('Картинка')
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('title', 'Title'),
		FormItem::text('slug', 'Slug'),
		FormItem::image('image', 'Image'),
	]);
	return $form;
});