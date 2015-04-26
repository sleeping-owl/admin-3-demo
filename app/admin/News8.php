<?php

Admin::model('App\News8')->title('News (bulk actions)')->alias('news8')->display(function ()
{
	$display = AdminDisplay::table();
	$display->actions([
		Column::action('export')->value('Export')->icon('fa-share')->target('_blank')->callback(function ($collection)
		{
			dd('You are trying to export:', $collection->toArray());
		}),
	]);
	$display->columns([
		Column::checkbox(),
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