<?php

Admin::model('App\Contact')->title('Contacts')->display(function ()
{
	$display = AdminDisplay::table();
	$display->with('country', 'companies');
	$display->filters([
		Filter::related('country_id')->model('App\Country'),
	]);
	$display->columns([
		Column::image('photo')->label('Photo<br/><small>(image)</small>'),
		Column::string('fullName')->label('Name<br/><small>(string with accessor)</small>'),
		Column::datetime('birthday')->label('Birthday<br/><small>(datetime)</small>')->format('d.m.Y'),
		Column::string('country.title')->label('Country<br/><small>(string from related model)</small>')->append(Column::filter('country_id')),
		Column::count('companies')->label('Companies<br/><small>(count)</small>'),
		Column::lists('companies.title')->label('Companies<br/><small>(lists)</small>'),
		Column::custom()->label('Has Photo?<br/><small>(custom)</small>')->callback(function ($instance)
		{
			return $instance->photo ? '&check;' : '-';
		}),
		Column::action('my_action')->label('<small>(action)</small>')->value('Custom action')->target('_blank')->callback(function ($instance)
		{
			dd('Custom action called with instance:', $instance->toArray());
		}),
	]);
	return $display;
})->createAndEdit(null)->delete(null);