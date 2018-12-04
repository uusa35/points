<?php

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'slug_ar' => $faker->name,
        'slug_en' => $faker->name,
        'order' => $faker->numberBetween(1, 99),
        'parent_id' => Category::where('parent_id', 0)->pluck('id')->shuffle()->first(),
    ];
});