<?php

Admin::model(\App\Country::class)->title('Countries')->display(function ()
{
	$display = AdminDisplay::tabbed();
	$display->tabs(function ()
	{
		$columns = [
			Column::string('title')->label('Title'),
			Column::custom()->label('Custom Column')->callback(function ($instance)
			{
				return substr($instance->title, 0, 3);
			}),
			Column::count('contacts')->label('Contacts')->append(Column::filter('country_id')->model(\App\Contact::class)),
		];

		$display = AdminDisplay::datatables();
		$display->order([[1, 'asc']]);
		$display->columns($columns);
		$display->filters([
			Filter::field('title')->title(function ($value)
			{
				return $value;
			}),
			Filter::scope('scope'),
			Filter::custom('tt')->title(function ($value)
			{
				return 'Title: ' . $value;
			})->callback(function ($query, $value)
			{
				$query->where('title', $value);
			}),
		]);

		$display2 = AdminDisplay::table();
		$display2->apply(function ($query)
		{
			$query->orderBy('id', 'desc');
			$query->limit(3);
		});
		$display2->columns($columns);

		$display3 = Admin::model(\App\Page::class)->display();

		return [
			AdminDisplay::tab($display)->label('All')->active(true),
			AdminDisplay::tab($display2)->label('Last 3'),
			AdminDisplay::tab($display3)->label('Pages'),
		];
	});
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::text('title', 'Title')->required()->unique(),
	]);
	return $form;
});