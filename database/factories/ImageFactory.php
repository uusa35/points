<?php

use App\Models\Category;
use App\Models\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'imagable_id' => Category::all()->random()->id,
        'imagable_type' => 'App\Backend\Category',
        'path' => $faker->numberBetween(1, 10) . '.jpeg',
        'caption_en' => $faker->sentence,
        'caption_ar' => $faker->sentence,
        'tag' => function($array) {
        return Category::whereId($array['imagable_id'])->first()->name;
        },
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'order' => $faker->numberBetween(1, 10),
    ];
});
