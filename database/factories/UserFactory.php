<?php

use App\Models\User;
use Faker\Generator as Faker;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'address_ar' => $faker->address,
        'address_en' => $faker->address,
        'caption_ar' => $faker->name,
        'caption_en' => $faker->name,
        'description_ar' => $faker->paragraph,
        'description_en' => $faker->paragraph,
        'service_ar' => $faker->name,
        'service_en' => $faker->name,
        'logo' => $faker->numberBetween(1, 10) . '.jpeg',
        'mobile' => $faker->bankAccountNumber,
        'phone' => $faker->bankAccountNumber,
        'api_token' => $faker->iban(null),
        'device_id' => $faker->iban(null),
        'active' => $faker->boolean(true),
        'role_id' => Role::where('is_visible', true)->get()->random()->id,
    ];
});
