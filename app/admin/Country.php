<?php

Admin::model('App\Country')->title('Countries (orderable)')->display(function ()
{
	$display = AdminDisplay::table();
	$display->apply(function ($query)
	{
		$query->orderBy('order', 'asc');
	});
	$display->columns([
		Column::string('title')->label('Title'),
		Column::count('contacts')->label('Contacts')->append(Column::filter('country_id')->model('App\Contact')),
		Column::order(),
	]);

	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('title', 'Title')->required()->unique(),
	]);
	return $form;
});