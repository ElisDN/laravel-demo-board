<?php

use App\Entity\Adverts\Category;
use Illuminate\Database\Seeder;

class AdvertCategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        factory(Category::class, 10)->create()->each(function(Category $category) {
            $counts = [0, random_int(3, 7)];
            $category->children()->saveMany(factory(Category::class, $counts[array_rand($counts)])->create()->each(function(Category $category) {
                $counts = [0, random_int(3, 7)];
                $category->children()->saveMany(factory(Category::class, $counts[array_rand($counts)])->create());
            }));
        });
    }
}
