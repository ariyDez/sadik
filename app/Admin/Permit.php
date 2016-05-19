<?php
use \SleepingOwl\Admin\Admin;
use \SleepingOwl\Admin\Display\AdminDisplay;
use \SleepingOwl\Admin\Columns\Column;
use \SleepingOwl\Admin\Form\AdminForm;
use \SleepingOwl\Admin\FormItems\FormItem;

Admin::model('App\Permit')->title('Права пользователей')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('name')->label('Имя'),
		Column::string('slug')->label('Slug'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('name', 'Имя'),
		FormItem::text('slug', 'Slug'),
	]);
	return $form;
});