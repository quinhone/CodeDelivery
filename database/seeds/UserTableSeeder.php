<?php

use Illuminate\Database\Seeder;
use CodeDelivery\Entities\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run ()
	{
		$faker = Faker::create ();

		User::create ( [
			'name' => 'Luis Carlos Quinhone',
			'email' => 'lcquinhone@gmail.com',
			'password' => bcrypt ( 123456 ),
			'remember_token' => str_random ( 10 ),
		] );

		foreach ( range ( 1, 9 ) as $i ) {
			User::create ( [
				'name' => $faker->name,
				'email' => $faker->email,
				'password' => bcrypt ( 123456 ),
				'remember_token' => str_random ( 10 ),
			] );
		}

	}
}
