<?php

Admin::model('App\PhotoCompetition')->title('Photo')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with('user', 'competition');
	$display->filters([
		Filter::related('user_id')->model('App\User'),
		Filter::related('competition_id')->model('App\Competition'),
	]);
	$display->columns([
		Column::string('title')->label('Title'),
		Column::string('image')->label('Image'),
		Column::string('desc')->label('Desc'),
		Column::string('user.email')->label('User')->append(Column::filter('user_id')),
		Column::string('competition.title')->label('Competition')->append(Column::filter('competition_id')),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([

	]);
	return $form;
});