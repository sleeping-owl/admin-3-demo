<?php

use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker\Factory::create();
		for ($i = 0; $i < 20; $i++)
		{
			\App\Company::create([
				'title'   => $faker->unique()->company,
				'address' => $faker->streetAddress,
				'phone'   => $faker->phoneNumber,
			]);
		}
	}

} 