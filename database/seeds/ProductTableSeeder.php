<?php

use Illuminate\Database\Seeder;
use CodeDelivery\Entities\Product;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
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
            Product::create ( [
                'category_id' => $faker->numberBetween(1,10),
                'name' => $faker->word,
                'description' => $faker->sentence,
                'price' => $faker->numberBetween(10, 50)
            ] );
        }
    }
}