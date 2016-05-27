<?php

use Illuminate\Database\Seeder;
use CodeDelivery\Entities\Order;
use Faker\Factory as Faker;

class OrderTableSeeder extends Seeder
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
            Order::create ( [
                'user_id' => $i,
                'cupom_id' => $i
            ] );
        }
    }
}