<?php

use Illuminate\Database\Seeder;
use CodeDelivery\Entities\OrderItem;
use Faker\Factory as Faker;

class OrderItemTableSeeder extends Seeder
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
            OrderItem::create ( [
                'product_id' => $i,
                'order_id' => $i,
                'price' => $faker->numberBetween(10,100),
                'qtd' => $faker->numberBetween(1, 5)
            ] );
        }
    }
}