<?php

use App\Models\Balance;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Balance::class, function (Faker $faker) {
    return [
        'points' => $faker->numberBetween(2, 100),
        'user_id' => User::onlyClients()->get()->random()->id,
    ];
});
