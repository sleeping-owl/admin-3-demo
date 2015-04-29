<?php

$template = 'SleepingOwl\Admin\Templates\TemplateDefault';
if (isset($_COOKIE['admin-template']))
{
	$template = 'SleepingOwl\AdminLteTemplate\Template';
}

return [
	/*
	 * Admin title
	 * Displays in page title and header
	 */
	'title'                   => 'SleepingOwlAdmin',

	/*
	 * Admin url prefix
	 */
	'prefix'                  => 'admin',

	'middleware'              => ['admin.auth'],

	/*
	 * Path to admin bootstrap files directory in app directory
	 * Default: 'app/admin'
	 */
	'bootstrapDirectory'      => app_path('admin'),

	'imagesUploadDirectory' => 'images/uploads',

	/*
	 * Authentication config
	 */
	'auth'                    => [
		'model' => '\SleepingOwl\AdminAuth\Entities\Administrator',
		'rules' => [
			'username' => 'required',
			'password' => 'required',
		]
	],

	'template'                => $template,

	'datetimeFormat'          => 'd.m.Y H:i',
	'dateFormat'              => 'd.m.Y',
	'timeFormat'              => 'H:i',
];
