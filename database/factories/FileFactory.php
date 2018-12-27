<?php

use App\Models\Category;
use App\Models\File;
use App\Models\Order;
use App\Models\User;
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
        'notes' => $faker->sentence,
        'order' => $faker->numberBetween(1, 10),
        'user_id' => User::all()->random()->id,
        'category_id' => Category::where(['is_files' => true ])->get()->random()->id,
    ];
});
