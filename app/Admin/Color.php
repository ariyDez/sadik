<?php

Admin::model('App\Color')->title('Цвета')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('key')->label('Название'),
		Column::string('value')->label('Код')
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('key', 'Key'),
		FormItem::color('value', 'Value')->label('Цвет')
	]);
	return $form;
});