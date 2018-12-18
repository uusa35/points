<?php

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'slug_ar' => $faker->name,
        'slug_en' => $faker->name,
        'caption_ar' => $faker->name,
        'caption_en' => $faker->name,
        'description_ar' => $faker->name,
        'description_en' => $faker->name,
        'duration' => $faker->numberBetween(2,15),
        'parent_id' => Category::where('parent_id', 0)->pluck('id')->shuffle()->first(),
        'order' => $faker->numberBetween(1,10),
        'active' => $faker->boolean(true),
        'path' => '1.pdf',
        'image' => $faker->numberBetween(1, 10) . '.jpeg',
    ];
});
