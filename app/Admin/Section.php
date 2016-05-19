<?php

Admin::model('App\Section')->title('Кружки')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with();
	$display->filters([

	]);
	$display->columns([
		Column::string('title')->label('Title'),
		Column::image('image')->label('Image'),
		Column::string('garden.title')->label('Садик')
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	if(Sentinel::inRole('admin'))
		$form->items([
			FormItem::text('title', 'Title'),
			FormItem::image('image', 'Image'),
			FormItem::ckeditor('info', 'Info'),
			FormItem::select('garden_id', "Садик")->model('App\Garden')->display('title')
		]);
	if(Sentinel::inRole('garden_owner'))
		$form->items([
			FormItem::text('title', 'Title'),
			FormItem::image('image', 'Image'),
			FormItem::ckeditor('info', 'Info'),
			//FormItem::select('garden_id', "Садик")->model(\App\User::find(Sentinel::getUser()->id)->gardens())->display('title')
			FormItem::selection('garden_id')->model('\App\Garden')->user(\App\User::find(Sentinel::getUser()->id))->display('title')
			//->setGardens(\App\User::find(Sentinel::getUser()->id)->gardens)
		]);
	//dd(\App\User::find(Sentinel::getUser()->id)->gardens->toArray());
	return $form;
});