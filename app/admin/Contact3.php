<?php

Admin::model('App\Contact3')->title('Contact')->alias('contacts3')->display(function ()
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
})->createAndEdit(function ($id)
{
	$display = AdminDisplay::tabbed();
	$display->tabs(function () use ($id)
	{
		$tabs = [];

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
					FormItem::textarea('comment', 'Comment'),
				],
			]),
		]);
		$tabs[] = AdminDisplay::tab($form)->label('Main Form')->active(true);

		if ( ! is_null($id))
		{
			$instance = App\Contact::find($id);
			if ($instance->country_id)
			{
				$country = Admin::model('App\Country')->fullEdit($instance->country_id);
				$tabs[] = AdminDisplay::tab($country)->label('Form from Related Model (Country)');
			}

			$companies = Admin::model('App\Company')->display();
			$companies->scope('withContact', $id);
			$companies->parameters(['contact_id' => $id]);
			$tabs[] = AdminDisplay::tab($companies)->label('Display from Related Model (Companies)');
		}
		return $tabs;
	});
	return $display;
})->delete(null);