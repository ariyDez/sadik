<?php

Admin::model('App\Recall')->title('Отзывы')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	if(!Sentinel::inRole('admin')) {
		$display->apply(function ($query) {
			$query->whereIn('garden_id', \App\User::find(Sentinel::getUser()->id)->gardens->lists('id')->toArray());
		});
		$display->columns([
			Column::string('user.email')->label('Пользователь'),
			Column::string('garden.title')->label('Садик'),
			Column::string('text')->label('Текст'),
			Column::string('rating')->label('Оценка')
		]);
	}
	$display->columns([
		Column::string('user.email')->label('Пользователь'),
		Column::string('text')->label('Текст'),
		Column::string('rating')->label('Оценка')
	]);
	return $display;
})->createAndEdit(function ()
{
	if(!Sentinel::inRole('admin'))
		return null;
	$form = AdminForm::form();
	$form->items([
		FormItem::text('user_id', 'User'),
		FormItem::text('garden_id', 'Garden'),
		FormItem::text('rating', 'Rating'),
		FormItem::ckeditor('text', 'Text'),
	]);
	return $form;
});