<?php

Admin::model('App\News7')->title('News (custom display)')->alias('news7')->display(function ()
{
	$rows = App\News7::all();
	$model = Admin::model('App\News7');
	return view('custom_display', compact('rows', 'model'));
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