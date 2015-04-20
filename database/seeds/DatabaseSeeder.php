<?php

use App\Company;
use App\Contact;
use App\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Seeder\DataSeeder;
use SleepingOwl\Seeder\Seeder as SleepingOwlSeeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		SleepingOwlSeeder::setDefaultLocale('en_US');
		SleepingOwlSeeder::setDefaultTimes(10);
		SleepingOwlSeeder::truncateAll();

		SleepingOwlSeeder::model(Country::class)
			->seed(function (DataSeeder $schema)
			{
				$schema->title->unique()->country;
			});

		SleepingOwlSeeder::model(Company::class)
			->seed(function (DataSeeder $schema)
			{
				$schema->title->unique()->company;
				$schema->address->streetAddress;
				$schema->phone->phoneNumber;
			});

		SleepingOwlSeeder::model(Contact::class)
			->seed(function (DataSeeder $schema)
			{
				$schema->firstName->firstName;
				$schema->lastName->lastName;
				$schema->birthday->dateTimeThisCentury;
				$schema->phone->phoneNumber;
				$schema->address->address;
				$schema->country_id->optional(0.9)->anyOf(Country::class);
				$schema->comment->paragraph(5);
				$schema->photo->optional()->randomElement([]);
			});

		SleepingOwlSeeder::table('company_contact')
			->ignoreExceptions()
			->seed(function ($schema)
			{
				$schema->company_id->anyOf(Company::class);
				$schema->contact_id->anyOf(Contact::class);
			});
	}

}
