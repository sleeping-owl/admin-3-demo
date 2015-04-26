<?php

Admin::model('App\News6')->title('News (disable edit or delete)')->alias('news6')->display(function ()
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
})->createAndEdit(function ($id)
{
	if ( ! is_null($id) && ($id % 2))
	{
		return null;
	}
	$form = AdminForm::form();
	$form->items([
		FormItem::text('title', 'Title')->required(),
		FormItem::date('date', 'Date')->required()->format('d.m.Y'),
		FormItem::checkbox('published', 'Published'),
		FormItem::ckeditor('text', 'Text'),
	]);
	return $form;
})->delete(function ($id)
{
	if ($id % 2)
	{
		return null;
	}
	return true;
});