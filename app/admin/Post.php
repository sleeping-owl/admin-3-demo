<?php

Admin::model('App\Post')->title('Posts (soft deletes)')->display(function ()
{
	$display = AdminDisplay::tabbed();
	$display->tabs(function ()
	{
		$tabs = [];

		$default = AdminDisplay::table();
		$default->columns([
			Column::string('title')->label('Title'),
		]);
		$tabs[] = AdminDisplay::tab($default)->label('Default')->active(true);

		$withTrashed = AdminDisplay::table();
		$withTrashed->scope('withTrashed');
		$withTrashed->columns([
			Column::string('title')->label('Title'),
		]);
		$tabs[] = AdminDisplay::tab($withTrashed)->label('With Trashed');

		$onlyTrashed = AdminDisplay::table();
		$onlyTrashed->scope('onlyTrashed');
		$onlyTrashed->columns([
			Column::string('title')->label('Title'),
		]);
		$tabs[] = AdminDisplay::tab($onlyTrashed)->label('Only Trashed');

		return $tabs;
	});

	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('title', 'Title')->required()->unique(),
		FormItem::ckeditor('text', 'Text'),
	]);
	return $form;
});