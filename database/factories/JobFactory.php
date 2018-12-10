<?php

use App\Models\Job;
use App\Models\Order;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    return [
        'description' => $faker->paragraph,
        'notes' => $faker->paragraph,
        'path' => '1.pdf',
        'active' => $faker->boolean,
        'is_complete' => $faker->boolean,
        'is_client_viewed' => $faker->boolean,
        'is_designer_viewed' => $faker->boolean,
        'priority' => $faker->numberBetween(1, 10),
        'is_urgent' => $faker->boolean,
        'order_id' => Order::all()->random()->id,
    ];
});
