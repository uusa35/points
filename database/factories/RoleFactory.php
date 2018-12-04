<?php

use App\Models\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'slug_ar' => $faker->name,
        'slug_en' => $faker->name,
        'caption_ar' => $faker->name,
        'caption_en' => $faker->name,
        'is_super' => $faker->boolean,
        'is_admin' => $faker->boolean,
        'is_client' => $faker->boolean,
        'is_visible' => $faker->boolean(true),
        'active' => $faker->boolean(true),
        'drawings' => $faker->boolean,
        'documents' => $faker->boolean,
        'phases' => $faker->boolean,
        'payments' => $faker->boolean,
        'galleries' => $faker->boolean,
        'subcontractors' => $faker->boolean,
        'timelines' => $faker->boolean,
        'reports' => $faker->boolean,
        'consultants' => $faker->boolean,
        'livecam' => $faker->boolean,
        'order' => $faker->numberBetween(1, 10),
    ];
});
