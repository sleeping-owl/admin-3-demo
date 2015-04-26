<?php

use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker\Factory::create();
		for ($i = 0; $i < 20; $i++)
		{
			\App\Page::create([
				'title' => $faker->sentence(5),
				'text'  => $faker->paragraph(5),
			]);
		}
		$pages = \App\Page::all();
		for ($i = 0; $i < 5; $i++)
		{
			$page1 = $pages->random();
			$page2 = $pages->random();
			if ($page1 == $page2) continue;

			try
			{
				$page1->makeChildOf($page2);
			} catch (\Exception $e)
			{
			}
		}
	}

} 