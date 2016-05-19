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
	if(!Sentinel::inRole('admin'))
		$display->apply(function($query){
			$query->where('user_id', Sentinel::getUser()->id);
		});
	$display->filters([

	]);
	$display->columns([
		Column::string('title')->label('Название'),
		Column::image('image')->label('Картинка'),
		Column::string('district.title')->label('Район'),
		Column::string('type.title')->label('Тип')
	]);
	return $display;
})->createAndEdit(function ($id)
{
	$form = AdminForm::form();
	if(Sentinel::inRole('admin'))
		$form->items([
			FormItem::text('title', 'Title'),
			FormItem::image('image', 'Image'),
			FormItem::select('user_id', 'Владелец')->model('App\User')->display('email'),
			FormItem::select('district_id', 'Районы')->model('App\District')->display('title'),
			FormItem::select('type_id', 'Тип')->model('App\Type')->display('title'),
		]);
	else
		$form->items([
			FormItem::text('title', 'Title'),
			FormItem::image('image', 'Image'),
			FormItem::hidden('user_id', Sentinel::check()->getUserId()),
			FormItem::select('district_id', 'Районы')->model('App\District')->display('title'),
			FormItem::select('type_id', 'Тип')->model('App\Type')->display('title'),
		]);
	return $form;
});