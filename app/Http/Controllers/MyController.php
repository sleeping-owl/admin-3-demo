<?php namespace App\Http\Controllers;

use Admin;
use Illuminate\Http\Request;

class MyController extends Controller
{

	public function getForm()
	{
		return Admin::view(view('my_form'), 'My Form');
	}

	public function postForm(Request $request)
	{
		$title = $request->get('title');
		$content = view('my_form_result', compact('title'));
		return Admin::view($content, 'My Form Result');
	}

} 