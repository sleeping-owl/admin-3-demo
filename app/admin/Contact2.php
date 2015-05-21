<?php

Admin::model('App\Contact2')->title('Contact')->alias('contacts2')->display(function ()
{
	$display = AdminDisplay::table();
	$display->with('country', 'companies');
	$display->filters([
		Filter::related('country_id')->model('App\Country'),
	]);
	$display->columns([
		Column::image('photo')->label('Photo'),
		Column::string('fullName')->label('Name'),
		Column::datetime('birthday')->label('Birthday')->format('d.m.Y'),
		Column::string('country.title')->label('Country')->append(Column::filter('country_id')),
		Column::lists('companies.title')->label('Companies'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::columns()->columns([
			[
				FormItem::text('firstName', 'First Name')->required(),
				FormItem::text('lastName', 'Last Name')->required(),
				FormItem::text('phone', 'Phone'),
				FormItem::text('address', 'Address'),
			],
			[
				FormItem::image('photo', 'Photo'),
				FormItem::date('birthday', 'Birthday')->format('d.m.Y'),
			],
			[
				FormItem::select('country_id', 'Country')->model('App\Country')->display('title'),
				FormItem::multiselect('companies', 'Companies')->model('App\Company')->display('title'),
				FormItem::textarea('comment', 'Comment'),
			],
		]),
	]);
	return $form;
})->delete(null);