<?php

Admin::model('App\News5')->title('News (disable create)')->alias('news5')->display(function ()
{
	$display = AdminDisplay::table();
	$display->columns([
		Column::string('title')->label('Title'),
		Column::datetime('date')->label('Date')->format('d.m.Y'),
		Column::custom()->label('Published')->callback(function ($instance)
		{
			return $instance->published ? '&check;' : '-';
		}),
	]);
	return $display;
})->create(null)->edit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('title', 'Title')->required(),
		FormItem::date('date', 'Date')->required()->format('d.m.Y'),
		FormItem::checkbox('published', 'Published'),
		FormItem::ckeditor('text', 'Text'),
	]);
	return $form;
});