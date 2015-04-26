<?php

use Illuminate\Database\Seeder;

class AdministratorsSeeder extends Seeder
{

	public function run()
	{
		\SleepingOwl\AdminAuth\Entities\Administrator::create([
			'username' => 'admin',
			'password' => Hash::make('SleepingOwl'),
			'name'     => 'admin',
		]);
	}

} 