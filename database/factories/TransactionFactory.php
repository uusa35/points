<?php

use App\Models\PaymentPlan;
use App\Models\Transaction;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'reference_id' => $faker->iban(),
        'is_complete' => $faker->boolean,
        'actual_amount' => $faker->numberBetween(10, 100),
        'payment_plan_id' => PaymentPlan::active()->get()->random()->first()->id,
        'user_id' => User::onlyClients()->get()->random()->first()->id,
    ];
});
