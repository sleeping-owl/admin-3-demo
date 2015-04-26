<?php

Admin::model('App\Company')->title('Companies')->display(function ()
{
	$display = AdminDisplay::table();
	$display->columns([
		Column::string('title')->label('Title'),
		Column::string('address')->label('Address'),
	]);
	return $display;
})->createAndEdit(function ($id)
{
	$form = AdminForm::form();
	$form->items([
		FormItem::hidden('contact_id'),
		FormItem::text('title', 'Title')->required()->unique(),
		FormItem::text('address', 'Address'),
		FormItem::text('phone', 'Phone'),
	]);
	return $form;
});