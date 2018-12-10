<?php

use App\Models\Category;
use App\Models\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug_ar' => $faker->paragraph,
        'slug_en' => $faker->paragraph,
        'description_en' => $faker->paragraphs,
        'description_ar' => $faker->paragraphs,
        'caption_ar' => $faker->paragraph,
        'caption_en' => $faker->paragraph,
        'duration' => $faker->numberBetween(2,8),
        'path' => '1.pdf',
        'on_sale' => $faker->boolean,
        'points' => $faker->numberBetween(50,100),
        'sale_points' => $faker->numberBetween(10,50),
        'category_id' => Category::all()->random()->id,
    ];
});
