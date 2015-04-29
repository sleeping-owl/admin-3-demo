<?php

Route::get('/', function ()
{
	$content = view('dashboard');
	return Admin::view($content, 'Dashboard');
});

Route::get('/template/{template}', [
	'as' => 'admin.change-template',
	function ($template)
	{
		if ($template == 0)
		{
			$cookie = cookie('admin-template', $template, -1);
		} else
		{
			$cookie = cookie('admin-template', $template);
		}
		return back()->withCookie($cookie);
	}
]);

Route::get('/about', function ()
{
	$content = view('about');
	return Admin::view($content, 'About');
});

Route::get('/my-form', '\App\Http\Controllers\MyController@getForm');

Route::post('/my-form', [
	'as'   => 'my-form.post',
	'uses' => '\App\Http\Controllers\MyController@postForm',
]);

Route::get('/model-display', function ()
{
	$display = Admin::model('App\Page')->display();
	$display2 = Admin::model('App\News')->display();
	$display3 = Admin::model('App\News3')->display();
	$content = view('model_display', compact('display', 'display2', 'display3'));
	return Admin::view($content, 'Model Display');
});