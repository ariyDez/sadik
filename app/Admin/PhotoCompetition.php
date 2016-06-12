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
		Column::image('image')->label('Image'),
		Column::string('user.email')->label('User')->append(Column::filter('user_id')),
		Column::string('competition.title')->label('Competition')->append(Column::filter('competition_id')),
		Column::string('likes')->label('Лайки')
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([

	]);
	return null;
});