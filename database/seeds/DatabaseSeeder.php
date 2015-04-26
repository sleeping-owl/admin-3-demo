<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$this->call('AdministratorsSeeder');
		$this->call('CountriesSeeder');
		$this->call('CompaniesSeeder');
		$this->call('ContactsSeeder');
		$this->call('CompanyContactSeeder');
		$this->call('PagesSeeder');
		$this->call('NewsSeeder');
		$this->call('PostsSeeder');
		$this->call('FormsSeeder');
	}

}
