<?php

use App\Models\Privilege;
use Faker\Generator as Faker;

$factory->define(Privilege::class, function (Faker $faker) {
    return [
        'module_name' => $faker->name,
        'create' => $faker->boolean,
        'update' => $faker->boolean,
        'delete' => $faker->boolean,
        'view' => $faker->boolean,
    ];
});
