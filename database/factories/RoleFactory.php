<?php

use App\Models\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug_ar' => $faker->sentence,
        'slug_en' => $faker->sentence,
        'caption_ar' => $faker->sentence,
        'caption_en' => $faker->sentence,
        'is_admin' => $faker->boolean,
        'is_super' => $faker->boolean,
        'is_client' => $faker->boolean,
        'is_designer' => $faker->boolean,
        'is_visible' => $faker->boolean,
        'active' => $faker->boolean,
        'color' => $faker->colorName,
        'order' => $faker->numberBetween(1, 10),
    ];
});
