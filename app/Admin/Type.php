<?php
use \SleepingOwl\Admin\Admin;
use \SleepingOwl\Admin\Display\AdminDisplay;
use \SleepingOwl\Admin\Columns\Column;
use \SleepingOwl\Admin\Form\AdminForm;
use \SleepingOwl\Admin\FormItems\FormItem;

Admin::model('App\Type')->title('Типы')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('title')->label('Title'),
		Column::image('image')->label('Image'),
		Column::string('info')->label('Info'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('title', 'Title')->required(),
		FormItem::text('info', 'Info'),
		FormItem::image('image', 'Image'),
	]);
	return $form;
});