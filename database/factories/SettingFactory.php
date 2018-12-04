<?php

use App\Models\Setting;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Setting::class, function (Faker\Generator $faker) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'description_ar' => $faker->paragraph(10),
        'description_en' => $faker->paragraph(10),
        'google_map_url' => $faker->url,
        'facebook_url' => $faker->url,
        'twitter_url' => $faker->url,
        'instagram_url' => $faker->url,
        'google_url' => $faker->url,
        'site_url' => $faker->url,
        'youtube_url' => $faker->url,
        'linkin_url' => $faker->url,
        'phone' => $faker->bankAccountNumber,
        'mobile' => $faker->bankAccountNumber,
        'fax' => $faker->bankAccountNumber,
        'whatsapp' => $faker->bankAccountNumber,
        'email' => $faker->email,
        'address_ar' => $faker->address,
        'address_en' => $faker->address,
        'logo' => $faker->numberBetween(1, 10) . '.jpeg',
        'bg' => $faker->numberBetween(1, 10) . '.jpeg',
        'on_home_speech_ar' => $faker->paragraph(2),
        'on_home_speech_en' => $faker->paragraph(2),
        'longitude' => $faker->longitude,
        'latitude' => $faker->latitude,
        'path' => '1.pdf',
        'zapper' => $faker->numberBetween(1, 10) . '.jpeg',
    ];
});