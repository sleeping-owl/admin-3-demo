<?php

use Illuminate\Database\Seeder;

class ContactsSeeder extends Seeder
{

	public function run()
	{
		$uploads = public_path('images/uploads');
		$filesObj = \Symfony\Component\Finder\Finder::create()->files()->in($uploads);
		$files = [];
		foreach ($filesObj as $file)
		{
			$files[] = $file->getFilename();
		}
		$countries = \App\Country::lists('id');

		$faker = Faker\Factory::create();
		for ($i = 0; $i < 20; $i++)
		{
			$image = $faker->optional()->randomElement($files);

			\App\Contact::create([
				'firstName'  => $faker->firstName,
				'lastName'   => $faker->lastName,
				'birthday'   => $faker->dateTimeThisCentury,
				'phone'      => $faker->phoneNumber,
				'address'    => $faker->address,
				'country_id' => $faker->optional()->randomElement($countries),
				'comment'    => $faker->paragraph(5),
				'photo'      => is_null($image) ? $image : ('images/uploads/' . $image),
				'height'     => $faker->randomNumber(2, true) + 100,
			]);
		}
	}

} 