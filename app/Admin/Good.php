<?php

Admin::model('App\Good')->title('Товары')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('title')->label('Title'),
		Column::string('price')->label('Цена'),
		Column::image('image')->label('Картинка'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::tabbed();
	$form->items([
		'Main Tab' => [
			FormItem::text('title', 'Title'),
			FormItem::text('price', 'Price'),
			FormItem::image('image', 'Image'),
			FormItem::ckeditor('description', 'Description'),
			FormItem::select('category_id')->model('App\GoodCategory')->label('Категория'),
		],
		'Meta штуки' => [
			FormItem::text('meta-head', 'Meta Head'),
			FormItem::text('meta-keyw', 'Meta Keyw'),
			FormItem::textarea('meta-desc', 'Meta Desc'),
		]
	]);
	return $form;
});