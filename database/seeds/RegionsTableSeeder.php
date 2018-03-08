<?php

use App\Entity\Region;
use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    public function run(): void
    {
        factory(Region::class, 10)->create()->each(function(Region $region) {
            $region->children()->saveMany(factory(Region::class, random_int(3, 10))->create()->each(function(Region $region) {
                $region->children()->saveMany(factory(Region::class, random_int(3, 10))->make());
            }));
        });
    }
}
