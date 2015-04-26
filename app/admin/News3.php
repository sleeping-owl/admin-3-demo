<?php

Admin::model('App\News3')->title('News')->alias('news3')->display(function ()
{
	$display = AdminDisplay::tabbed();
	$display->tabs(function ()
	{
		$tabs = [];

		$columns = [
			Column::string('title')->label('Title'),
			Column::datetime('date')->label('Date')->format('d.m.Y'),
			Column::custom()->label('Published')->callback(function ($instance)
			{
				return $instance->published ? '&check;' : '-';
			}),
		];

		$main = AdminDisplay::table();
		$main->columns($columns);
		$tabs[] = AdminDisplay::tab($main)->label('Main')->active(true);


		$withScope = AdminDisplay::table();
		$withScope->scope('last');
		$withScope->columns($columns);
		$tabs[] = AdminDisplay::tab($withScope)->label('With Scope');


		$otherColumns = AdminDisplay::table();
		$otherColumns->apply(function ($query)
		{
			$query->orderBy('title', 'asc');
		});
		$otherColumns->columns([
			Column::string('title')->label('Title'),
			Column::custom()->label('Title Length')->callback(function ($instance)
			{
				return strlen($instance->title);
			}),
		]);
		$tabs[] = AdminDisplay::tab($otherColumns)->label('Other Columns and Order');


		$otherDisplay = Admin::model('App\Page')->display();
		$tabs[] = AdminDisplay::tab($otherDisplay)->label('Display from Other Model');

		return $tabs;
	});
	return $display;
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