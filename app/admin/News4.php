<?php

Admin::model('App\News4')->title('News')->alias('news4')->display(function ()
{
	$display = AdminDisplay::table();
	$display->filters([
		Filter::scope('last')->title('Latest News'),
		Filter::field('published')->title(function ($value)
		{
			return $value ? 'Published' : 'Not Published';
		}),
		Filter::custom('limit')->title(function ($value)
		{
			return 'Custom Filter: ' . $value;
		})->callback(function ($query, $value)
		{
			$query->limit($value);
		}),
	]);
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