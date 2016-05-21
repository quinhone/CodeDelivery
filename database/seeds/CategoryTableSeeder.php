<?php

use Illuminate\Database\Seeder;
use CodeDelivery\Entities\Category;
use Faker\Factory as Faker;

class CategoryTableSeeder extends Seeder
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
            Category::create ( [
                'name' => $faker->word
            ] );
        }
    }
}
