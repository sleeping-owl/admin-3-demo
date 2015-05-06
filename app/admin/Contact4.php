<?php

Admin::model('App\Contact4')->title('Contact')->alias('contacts4')->display(function ()
{
	$display = AdminDisplay::datatables();
	$display->with('country', 'companies');
	$display->filters([
		Filter::related('country_id')->model('App\Country'),
	]);
	$display->order([[1, 'asc']]);
	$display->columns([
		Column::image('photo')->label('Photo'),
		Column::string('fullName')->label('Name'),
		Column::string('height')->label('Height'),
		Column::datetime('birthday')->label('Birthday')->format('d.m.Y'),
		Column::string('country.title')->label('Country')->append(Column::filter('country_id')),
		Column::lists('companies.title')->label('Companies'),
	]);
	$display->columnFilters([
		null,
		ColumnFilter::text()->placeholder('Full Name'),
		ColumnFilter::range()->from(
			ColumnFilter::text()->placeholder('From')
		)->to(
			ColumnFilter::text()->placeholder('To')
		),
		ColumnFilter::range()->from(
			ColumnFilter::date()->placeholder('From Date')->format('d.m.Y')
		)->to(
			ColumnFilter::date()->placeholder('To Date')->format('d.m.Y')
		),
		ColumnFilter::select()->placeholder('Country')->model('\App\Country')->display('title'),
		ColumnFilter::text()->placeholder('Companies'),
	]);
	return $display;
})->createAndEdit(function ($id)
{
	return null;
})->delete(null);