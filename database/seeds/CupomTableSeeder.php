<?php

use Illuminate\Database\Seeder;
use CodeDelivery\Entities\Cupom;
use Faker\Factory as Faker;

class CupomTableSeeder extends Seeder
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
            Cupom::create ( [
                'code' => $faker->numberBetween(1000, 10000),
                'value' => $faker->numberBetween(100, 1000),
                'used' => 0
            ] );
        }
    }
}
