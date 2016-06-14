<?php

Admin::model('App\Competition')->title('Competition')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('title')->label('Title'),
		Column::image('image')->label('Image'),
		Column::string('desc')->label('Desc'),
		Column::datetime('started_at')->label('Started_at')->format('d.m.Y H:i'),
		Column::datetime('finished_at')->label('Finished_at')->format('d.m.Y H:i'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('title', 'Title'),
		FormItem::image('image', 'Image'),
		FormItem::ckeditor('desc', 'Desc'),
		FormItem::timestamp('started_at', 'Started At')->format('d.m.Y'),//->seconds(true),
		FormItem::timestamp('finished_at', 'Finished At')->format('d.m.Y'),//->seconds(true),
	]);
	return $form;
});