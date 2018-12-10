<?php

use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'slogan' => $faker->name,
        'website' => $faker->url,
        'facebook' => $faker->url,
        'instagram' => $faker->url,
        'youtube' => $faker->url,
        'twitter' => $faker->url,
        'mobile' => $faker->phoneNumber,
        'phone_one' => $faker->phoneNumber,
        'phone_tow' => $faker->phoneNumber,
        'fax' => $faker->phoneNumber,
        'whatsapp' => $faker->phoneNumber,
        'snapchat' => $faker->url,
        'qr' => $faker->imageUrl(),
        'iphone' => $faker->url,
        'android' => $faker->url,
        'path' => '1.pdf',
        'points' => $faker->numberBetween(10, 100),
        'description_ar' => $faker->paragraphs,
        'description_en' => $faker->paragraphs,
        'notes_ar' => $faker->paragraph,
        'notes_en' => $faker->paragraph,
        'is_paid' => $faker->boolean,
        'is_complete' => $faker->boolean,
        'on_progress' => $faker->boolean,
        'service_id' => Service::all()->random()->id,
        'user_id' => User::clients()->random()->id,
        'preferred_colors_1' => $faker->colorName,
        'preferred_colors_2' => $faker->colorName,
        'preferred_colors_3' => $faker->colorName,
        'unwanted_colors_1' => $faker->colorName,
        'unwanted_colors_2' => $faker->colorName,
        'unwanted_colors_3' => $faker->colorName,
    ];
});
