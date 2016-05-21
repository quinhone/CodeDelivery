<?php

use Illuminate\Database\Seeder;
use CodeDelivery\Entities\Client;
use Faker\Factory as Faker;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create ();

        foreach ( range ( 1, 10 ) as $i ) {
            Client::create ( [
                'user_id' => $i,
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'city' => $faker->city,
                'state' => $faker->country,
                'zipcode' => $faker->postcode,
            ] );
        }
    }
}
