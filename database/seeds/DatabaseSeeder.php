<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(AdvertCategoriesTableSeeder::class);
    }
}
