<?php
use \SleepingOwl\Admin\Admin;
use \SleepingOwl\Admin\FormItems\FormItem;
use \SleepingOwl\Admin\Form\AdminForm;
use \SleepingOwl\Admin\Display\AdminDisplay;
use \SleepingOwl\Admin\Columns\Column;

Admin::model('App\Role')->title('Роли пользователей	')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Название роли'),
		Column::string('slug')->label('Роль')
	]);
	return $display;
})->createAndEdit(function ($id)
{
	$form = AdminForm::form();
	if(in_array($id, [1,2,3]))
		$form->items([
			FormItem::text('name', 'Название роли'),
			FormItem::text('slug', 'Роль')->readonly(true),
			FormItem::multiselect('permits', 'Права доступа')->model('App\Permit')->display('name')
		]);
	else
		$form->items([
			FormItem::text('name', 'Название')->required(),
			FormItem::text('slug', 'Роль')->required()->unique(),
			FormItem::multiselect('permits', 'Права доступа')->model('App\Permit')->display('name')
		]);
	return $form;
})->delete(function($id){
	if(in_array($id, [1,2,3]))
		return null;
	else
		return 1;
});