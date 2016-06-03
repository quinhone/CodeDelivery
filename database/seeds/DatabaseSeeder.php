<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(CupomTableSeeder::class);
        $this->call(OrderTableSeeder::class);
        $this->call(OrderItemTableSeeder::class);
        $this->call(OAuthClientSeeder::class);

        Model::reguard();
    }
}
