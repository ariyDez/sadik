<?php
use \SleepingOwl\Admin\Admin;
use \SleepingOwl\Admin\Display\AdminDisplay;
use \SleepingOwl\Admin\Columns\Column;
use \SleepingOwl\Admin\Form\AdminForm;
use \SleepingOwl\Admin\FormItems\FormItem;

Admin::model('App\Garden')->title('Садики')->display(function ()
{
	$display = AdminDisplay::datatables();

	$display->with();
	$display->filters([

	]);
	if(!Sentinel::inRole('admin'))
	{
		$display->apply(function($query){
			$query->where('user_id', Sentinel::getUser()->id);
		});
		$display->columns([
			Column::string('title')->label('Название'),
			Column::image('image')->label('Картинка'),
			Column::string('district.title')->label('Район'),
			Column::string('type.title')->label('Тип'),
		]);
	}
	else
		$display->columns([
			Column::string('title')->label('Название'),
			Column::image('image')->label('Картинка'),
			Column::string('district.title')->label('Район'),
			Column::string('type.title')->label('Тип'),
			Column::string('user.first_name')->label('Пользователь')
		]);
	return $display;
})->create(function(){
	$form = AdminForm::tabbed();
	if(Sentinel::inRole('admin'))
		$form->items([
			'Main' => [
				FormItem::text('title', 'Title')->required()->unique(),
				FormItem::image('image', 'Image'),
				FormItem::select('user_id', 'Владелец')->model('App\User')->display('email')->required(),
				FormItem::select('district_id', 'Районы')->model('App\District')->display('title')->required(),
				FormItem::select('type_id', 'Тип')->model('App\Type')->display('title')->required(),
				FormItem::text('latitude', 'Широта')->required(),
				FormItem::text('longitude', 'Долгота')->required(),
				FormItem::text('seats', 'Количество мест')->required(),
				FormItem::text('engaged', 'Занятые места')->required(),
				FormItem::ckeditor('info', 'Информация')
			],
			'SEO' => [
				FormItem::text('meta-head', 'Meta Заголовок'),
				FormItem::text('meta-key', 'Meta Ключевые слова'),
				FormItem::textarea('meta-desc', 'Meta Описание'),
			]
		]);
	else
	{
		$user = \App\User::find(Sentinel::getUser()->id);
		if(count($user->gardens) >= 1)
			return null;
		else
		{
			$form->items([
				'Main' => [
					FormItem::text('title', 'Title')->required(),
					FormItem::image('image', 'Image')->required(),
					FormItem::hidden('user_id', Sentinel::check()->getUserId()),
					FormItem::select('district_id', 'Районы')->model('App\District')->display('title')->required(),
					FormItem::select('type_id', 'Тип')->model('App\Type')->display('title')->required(),
					FormItem::text('latitude', 'Широта')->required(),
					FormItem::text('longitude', 'Долгота')->required(),
					FormItem::text('seats', 'Количество мест')->required(),
					FormItem::text('engaged', 'Занятые места')->required(),
					FormItem::ckeditor('info', 'Информация')
				],
				'SEO' => [
					FormItem::text('meta-head', 'Meta Заголовок'),
					FormItem::text('meta-key', 'Meta Ключевые слова'),
					FormItem::textarea('meta-desc', 'Meta Описание'),
				]


			]);
		}
	}
	return $form;
})->edit(function ($id)
{
	$form = AdminForm::tabbed();
	if(Sentinel::inRole('admin'))
		$form->items([
			'Main' => [
				FormItem::text('title', 'Title')->required()->unique(),
				FormItem::image('image', 'Image'),
				FormItem::select('user_id', 'Владелец')->model('App\User')->display('email')->required(),
				FormItem::select('district_id', 'Районы')->model('App\District')->display('title')->required(),
				FormItem::select('type_id', 'Тип')->model('App\Type')->display('title')->required(),
				FormItem::text('latitude', 'Широта')->required(),
				FormItem::text('longitude', 'Долгота')->required(),
				FormItem::text('seats', 'Количество мест')->required(),
				FormItem::text('engaged', 'Занятые места')->required(),
				FormItem::ckeditor('info', 'Информация')
			],
			'SEO' => [
				FormItem::text('meta-head', 'Meta Заголовок'),
				FormItem::text('meta-key', 'Meta Ключевые слова'),
				FormItem::textarea('meta-desc', 'Meta Описание'),
			]

		]);
	else
		$form->items([
			'Main' => [
				FormItem::text('title', 'Title')->required(),
				FormItem::image('image', 'Image')->required(),
				FormItem::hidden('user_id', Sentinel::check()->getUserId()),
				FormItem::select('district_id', 'Районы')->model('App\District')->display('title')->required(),
				FormItem::select('type_id', 'Тип')->model('App\Type')->display('title')->required(),
				FormItem::text('latitude', 'Широта')->required(),
				FormItem::text('longitude', 'Долгота')->required(),
				FormItem::text('seats', 'Количество мест')->required(),
				FormItem::text('engaged', 'Занятые места')->required(),
				FormItem::ckeditor('info', 'Информация')
			],
			'SEO' => [
				FormItem::text('meta-head', 'Meta Заголовок'),
				FormItem::text('meta-key', 'Meta Ключевые слова'),
				FormItem::textarea('meta-desc', 'Meta Описание'),
			]
			
			
		]);
	return $form;
});