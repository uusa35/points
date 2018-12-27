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
        'facebook' => $faker->url,
        'twitter' => $faker->url,
        'instagram' => $faker->url,
        'google' => $faker->url,
        'website' => $faker->url,
        'youtube' => $faker->url,
        'linkin' => $faker->url,
        'phone' => $faker->bankAccountNumber,
        'mobile' => $faker->bankAccountNumber,
        'fax' => $faker->bankAccountNumber,
        'whatsapp' => $faker->bankAccountNumber,
        'info_email' => $faker->email,
        'support_email' => $faker->email,
        'sales_email' => $faker->email,
        'admin_email' => $faker->email,
        'address_ar' => $faker->address,
        'address_en' => $faker->address,
        'country' => $faker->country,
        'logo' => $faker->numberBetween(1, 10) . '.jpeg',
        'bg' => $faker->numberBetween(1, 10) . '.jpeg',
        'on_home_speech_ar' => $faker->paragraph(2),
        'on_home_speech_en' => $faker->paragraph(2),
        'longitude' => $faker->longitude,
        'latitude' => $faker->latitude,
        'path' => '1.pdf',
        'zapper' => $faker->numberBetween(1, 10) . '.jpeg',
        'qr' => $faker->numberBetween(1, 10) . '.jpeg',
        'title_one_ar' => $faker->name,
        'title_one_ar' => $faker->name,
        'section_one_ar' => $faker->name,
        'section_one_en' => $faker->name,
        'title_two_ar' => $faker->name,
        'title_two_ar' => $faker->name,
        'section_two_ar' => $faker->name,
        'section_two_en' => $faker->name,
        'title_three_ar' => $faker->name,
        'title_three_ar' => $faker->name,
        'section_three_ar' => $faker->name,
        'section_three_en' => $faker->name,
        'video' => $faker->imageUrl(),
    ];
});
