<?php

use App\Models\File;
use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(File::class, function (Faker $faker) {
    return [
        'filable_id' => Order::all()->random()->id,
        'filable_type' => 'App\Backend\Order',
        'path' => '1.pdf',
        'caption_en' => $faker->sentence,
        'caption_ar' => $faker->sentence,
        'tag' => function($array) {
            return Order::whereId($array['filable_id'])->first()->name;
        },
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'order' => $faker->numberBetween(1, 10),
    ];
});
