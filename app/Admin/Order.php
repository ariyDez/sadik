<?php

Admin::model('App\Order')->title('Заказы')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('user.email')->label('Заказчик'),
		Column::string('good.title')->label('Товар'),
		Column::string('good.price')->label('Цена'),
		Column::string('deal')->label('Количество'),
		Column::string('created_at')->label('Дата заказа')
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([

	]);
	return $form;
});