<?php

use App\Models\Order;
use App\Models\Service;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'lang' => $faker->randomElement(['ar', 'lang', 'both']),
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
        'phone_two' => $faker->phoneNumber,
        'fax' => $faker->phoneNumber,
        'whatsapp' => $faker->phoneNumber,
        'snapchat' => $faker->url,
        'iphone' => $faker->url,
        'android' => $faker->url,
        'points' => $faker->numberBetween(10, 100),
        'description_ar' => $faker->sentence,
        'description_en' => $faker->sentence,
        'notes_ar' => $faker->sentence,
        'notes_en' => $faker->sentence,
        'address_ar' => $faker->address,
        'address_en' => $faker->address,
        'is_paid' => $faker->boolean,
        'is_complete' => $faker->boolean,
        'service_id' => Service::all()->random()->id,
        'user_id' => User::onlyClients()->get()->random()->id,
        'preferred_colors_1' => $faker->colorName,
        'preferred_colors_2' => $faker->colorName,
        'preferred_colors_3' => $faker->colorName,
        'unwanted_colors_1' => $faker->colorName,
        'unwanted_colors_2' => $faker->colorName,
        'unwanted_colors_3' => $faker->colorName,
    ];
});
