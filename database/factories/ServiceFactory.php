<?php

use App\Models\Category;
use App\Models\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug_ar' => $faker->sentence,
        'slug_en' => $faker->sentence,
        'description_en' => $faker->paragraph,
        'description_ar' => $faker->paragraph,
        'caption_ar' => $faker->sentence,
        'caption_en' => $faker->sentence,
        'duration' => $faker->numberBetween(2,8),
        'order' => $faker->numberBetween(2,99),
        'image' => $faker->numberBetween(1,10) .'.jpeg',
        'path' => '1.pdf',
        'on_sale' => $faker->boolean,
        'active' => $faker->boolean(true),
        'points' => $faker->numberBetween(50,100),
        'sale_points' => $faker->numberBetween(10,50),
        'category_id' => Category::all()->random()->id,
    ];
});
