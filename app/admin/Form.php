<?php

Admin::model('App\Form')->title('Form Items')->display(function ()
{
	$display = AdminDisplay::table();
	$display->columns([
		Column::string('id')->label('ID'),
		Column::string('title')->label('String'),
		Column::datetime('created_at')->label('Created At')->format('d.m.Y H:i:s'),
	]);
	return $display;
})->createAndEdit(function ()
{
	$form = AdminForm::form();
	$form->items([
		FormItem::columns()->columns([
			[
				FormItem::text('title', 'FormItem::text')->defaultValue('default value')->required(),
				FormItem::textaddon('textaddon', 'FormItem::textaddon')->addon('$')->placement('after'),
				FormItem::checkbox('checkbox', 'FormItem::checkbox'),
				FormItem::date('date', 'FormItem::date')->format('d.m.Y'),
				FormItem::time('time', 'FormItem::time')->format('H:i:s')->seconds(true),
				FormItem::timestamp('timestamp', 'FormItem::timestamp')->format('d.m.Y g:i A'),
			],
			[
				FormItem::select('select', 'FormItem::select')->options([
					1 => 'First',
					2 => 'Second',
					3 => 'Third'
				])->nullable(),
				FormItem::custom()->display(function ($instance)
				{
					return view('custom_form_item', compact('instance'));
				})->callback(function ($instance)
				{
					$instance->custom = \Carbon\Carbon::now();
				}),
			],
			[
				FormItem::image('image', 'FormItem::image'),
				FormItem::images('images', 'FormItem::images'),
			],
		]),
		FormItem::columns()->columns([
			[
				FormItem::textarea('textarea', 'FormItem::textarea'),
			],
			[
				FormItem::ckeditor('ckeditor', 'FormItem::ckeditor'),
			]
		]),
	]);
	return $form;
});