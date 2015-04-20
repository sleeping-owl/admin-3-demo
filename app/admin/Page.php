<?php

Admin::model(\App\Page::class)->title('Pages')->display(function ()
{
	$display = AdminDisplay::tree();
	return $display;
})->createAndEdit(function ($id)
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('title', 'Title'),
	]);
	return $form;
});