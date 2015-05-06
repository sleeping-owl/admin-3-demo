<?php

Admin::menu()->url('/')->label('Dashboard')->icon('fa-dashboard');
Admin::menu()->label('Data Display Types')->icon('fa-desktop')->items(function ()
{
	Admin::menu('App\News')->label('Table')->icon('fa-table');
	Admin::menu('App\News2')->label('Datatables')->icon('fa-table');
	Admin::menu('App\News9')->label('Datatables Async')->icon('fa-table');
	Admin::menu('App\News3')->label('Tabs')->icon('fa-reorder');
	Admin::menu('App\Page')->label('Tree')->icon('fa-sitemap');
	Admin::menu('App\News7')->label('Custom')->icon('fa-file-code-o');
});
Admin::menu()->label('Data Filters')->icon('fa-filter')->items(function ()
{
	Admin::menu()->url('news4?last')->label('Scope')->icon('fa-filter');
	Admin::menu()->url('news4?published=1')->label('Field')->icon('fa-filter');
	Admin::menu()->url('contacts?country_id=2')->label('Related')->icon('fa-filter');
	Admin::menu()->url('news4?limit=5')->label('Custom')->icon('fa-filter');
});
Admin::menu('App\Contact')->icon('fa-columns')->label('Columns');
Admin::menu()->label('Features')->icon('fa-briefcase')->items(function ()
{
	Admin::menu('App\Country')->icon('fa-sort')->label('Orderable');
	Admin::menu('App\Contact4')->icon('fa-filter')->label('Column Filters');
	Admin::menu('App\Post')->icon('fa-star-half-o')->label('Soft Deletes');
	Admin::menu('App\News5')->icon('fa-lock')->label('Disable Create');
	Admin::menu('App\News6')->icon('fa-lock')->label('Disable Edit or Delete');
	Admin::menu('App\News8')->icon('fa-cubes')->label('Bulk Actions');
});
Admin::menu()->label('Forms')->icon('fa-cubes')->items(function ()
{
	Admin::menu('App\Contact2')->icon('fa-columns')->label('Columns');
	Admin::menu('App\Contact3')->icon('fa-reorder')->label('Tabs');
	Admin::menu('App\Form')->icon('fa-briefcase')->label('Form Items');
});
Admin::menu()->label('Custom Routes')->icon('fa-reorder')->items(function ()
{
	Admin::menu()->url('about')->icon('fa-wrench')->label('Get Route');
	Admin::menu()->url('my-form')->icon('fa-wrench')->label('Post Route');
	Admin::menu()->url('model-display')->icon('fa-wrench')->label('Model Display');
});