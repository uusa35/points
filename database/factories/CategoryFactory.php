<?php

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'slug_ar' => $faker->name,
        'slug_en' => $faker->name,
        'caption_ar' => $faker->paragraph,
        'caption_en' => $faker->paragraph,
        'description_ar' => $faker->paragraphs,
        'description_en' => $faker->paragraphs,
        'duration' => $faker->numberBetween(2,15),
        'parent_id' => Category::where('parent_id', 0)->pluck('id')->shuffle()->first(),
        'order' => $faker->numberBetween(1,10),
        'active' => $faker->boolean(true),
        'path' => '1.pdf',
    ];
});
