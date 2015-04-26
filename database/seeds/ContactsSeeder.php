<?php

use Illuminate\Database\Seeder;

class ContactsSeeder extends Seeder
{

	public function run()
	{
		$uploads = public_path('images/uploads');
		File::deleteDirectory($uploads);
		File::makeDirectory($uploads, 0755);
		$countries = \App\Country::lists('id');

		$faker = Faker\Factory::create();
		for ($i = 0; $i < 20; $i++)
		{
			$image = $faker->optional()->image($uploads, 640, 480, null, false);

			\App\Contact::create([
				'firstName' => $faker->firstName,
				'lastName'  => $faker->lastName,
				'birthday'  => $faker->dateTimeThisCentury,
				'phone'     => $faker->phoneNumber,
				'address'   => $faker->address,
				'country_id' => $faker->optional()->randomElement($countries),
				'comment' => $faker->paragraph(5),
				'photo' => is_null($image) ? $image : ('images/uploads/' . $image),
			]);
		}
	}

} 