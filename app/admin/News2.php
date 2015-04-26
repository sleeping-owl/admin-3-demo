<?php

Admin::model('App\News2')->title('News')->alias('news2')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->order([[1, 'desc']]);
	$display->columns([
		Column::string('title')->label('Title'),
		Column::datetime('date')->label('Date')->format('d.m.Y'),
		Column::custom()->label('Published')->callback(function ($instance)
		{
			return $instance->published ? '&check;' : '-';
		}),
	]);
	return $display;
})->createAndEdit(function ()
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