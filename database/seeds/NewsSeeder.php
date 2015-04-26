<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker\Factory::create();
		for ($i = 0; $i < 20; $i++)
		{
			\App\News::create([
				'title'     => $faker->unique()->sentence(4),
				'date'      => $faker->dateTimeThisCentury,
				'published' => $faker->boolean(),
				'text'      => $faker->paragraph(5),
			]);
		}
	}

} 