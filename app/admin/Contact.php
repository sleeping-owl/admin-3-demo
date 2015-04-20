<?php

Admin::model(\App\Contact::class)->title('Contact')->display(function ()
{
	$display = AdminDisplay::table();
	$display->with('country', 'companies');
	$display->filters([
		Filter::related('country_id')->model(\App\Country::class),
	]);
	$display->columns([
		Column::string('firstName')->label('First Name'),
		Column::string('lastName')->label('Last Name'),
		Column::datetime('birthday')->label('Birthday')->format('m/d/Y'),
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
				],
				[
					FormItem::text('phone', 'Phone'),
					FormItem::text('address', 'Address'),
				],
			]),
		]);
		$tabs[] = AdminDisplay::tab($form)->label('Main Form')->active(true);

		if ($id)
		{
			$instance = \App\Contact::find($id);
			$country = Admin::model(\App\Country::class)->edit($instance->country_id);
			$tabs[] = AdminDisplay::tab($country)->label('Country');


			$companies = Admin::model(\App\Company::class)->display();
			$companies->scope('withContact', $id);
			$companies->parameters(['contact_id' => $id]);
			$tabs[] = AdminDisplay::tab($companies)->label('Companies');
		}

		return $tabs;
	});


	return $display;
});