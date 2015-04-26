<?php

use Illuminate\Database\Seeder;

class CompanyContactSeeder extends Seeder
{

	public function run()
	{
		$contacts = \App\Contact::all();
		$companies = \App\Company::all();
		for ($i = 0; $i < 20; $i++)
		{
			try
			{
				$contacts->random()->companies()->attach($companies->random());
			} catch (\Exception $e)
			{
			}
		}
	}

} 