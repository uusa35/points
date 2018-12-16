<?php

use App\Models\PaymentPlan;
use Faker\Generator as Faker;

$factory->define(PaymentPlan::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug_ar' => $faker->name,
        'slug_en' => $faker->name,
        'description_ar' => $faker->paragraph,
        'description_en' => $faker->paragraph,
        'image' => $faker->numberBetween(1, 10) . '.jpeg',
        'path' => '1.pdf',
        'price' => $faker->randomFloat(3, 10, 200),
        'bonus' => $faker->numberBetween(2,20),
        'apply_bonus' => $faker->boolean(true),
        'color' => $faker->colorName,
        'order' => $faker->numberBetween(1,40),
        'active' => $faker->boolean(true),
    ];
});
