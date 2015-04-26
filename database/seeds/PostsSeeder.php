<?php

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{

	public function run()
	{
		$faker = Faker\Factory::create();
		for ($i = 0; $i < 20; $i++)
		{
			$post = \App\Post::create([
				'title' => $faker->sentence(5),
				'text'  => $faker->paragraph(5),
			]);
			if (mt_rand(0, 10) < 3)
			{
				$post->delete();
			}
		}
	}

} 