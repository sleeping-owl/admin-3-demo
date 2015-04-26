<?php

use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker\Factory::create();
		for ($i = 0; $i < 20; $i++)
		{
			\App\Country::create([
				'title' => $faker->unique()->country,
			]);
		}
	}

} 