<?php

use App\Models\Slider;
use Faker\Generator as Faker;

$factory->define(Slider::class, function (Faker $faker) {
    return [
        'image' => $faker->numberBetween(1, 10) . '.jpeg',
        'url' => $faker->url,
        'caption_en' => $faker->name,
        'caption_ar' => $faker->name,
        'active' => $faker->boolean,
        'order' => $faker->numberBetween(1,10),
    ];
});
