<?php

Admin::model('App\Good')->title('Товары')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	if(!Sentinel::inRole('admin'))
		$display->apply(function($query){
			$query->where('user_id', Sentinel::getUser()->id);
		});
	$display->filters([

	]);

	$display->columns([
		Column::string('title')->label('Title'),
		Column::string('price')->label('Цена'),
		Column::image('image')->label('Картинка'),
		Column::string('goodCategory.title')->label('Категория')
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::tabbed();
	if(Sentinel::inRole('admin'))
		$form->items([
			'Main Tab' => [
				FormItem::text('title', 'Title'),
				FormItem::text('price', 'Price'),
				FormItem::image('image', 'Image'),
				FormItem::select('user_id')->model('App\User')->display('email'),
				FormItem::ckeditor('description', 'Description'),
				FormItem::select('good_category_id')->model('App\GoodCategory')->label('Категория'),
				FormItem::multiselect('colors', 'Colors')->model('App\Color')->display('key')
			],
			'SEO' => [
				FormItem::text('meta-head', 'Meta Заголовок'),
				FormItem::text('meta-keyw', 'Meta Ключевые слова'),
				FormItem::textarea('meta-desc', 'Meta Описание'),
			]
		]);
	else
		$form->items([
			'Main Tab' => [
				FormItem::text('title', 'Title'),
				FormItem::text('price', 'Price'),
				FormItem::image('image', 'Image'),
				FormItem::hidden('user_id', Sentinel::check()->getUserId()),
				FormItem::ckeditor('description', 'Description'),
				FormItem::select('good_category_id')->model('App\GoodCategory')->label('Категория'),
			],
			'Meta штуки' => [
				FormItem::text('meta-head', 'Meta Head'),
				FormItem::text('meta-keyw', 'Meta Keyw'),
				FormItem::textarea('meta-desc', 'Meta Desc'),
			]
		]);
	return $form;
});