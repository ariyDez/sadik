<?php

Admin::model('App\Article')->title('Новости')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('title')->label('Заголовок'),
		Column::string('category.title')->label('Категория'),
		Column::image('image')->label('Картинка'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('title', 'Title'),
		FormItem::image('image', 'Image'),
		FormItem::select('category_id')->model('App\ArticleCategory')->label('Категория'),
		FormItem::ckeditor('text', 'Text'),
	]);
	return $form;
});