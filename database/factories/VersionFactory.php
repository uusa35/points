<?php

use App\Models\Job;
use App\Models\Version;
use Faker\Generator as Faker;

$factory->define(Version::class, function (Faker $faker) {
    return [
        'notes' => $faker->name,
        'description' => $faker->name,
        'path' => '1.pdf',
        'active' => $faker->boolean(true),
        'is_complete' => $faker->boolean,
        'is_client_viewed' => $faker->boolean,
        'is_designer_viewed' => $faker->boolean,
        'job_id' => Job::all()->random()->id,
    ];
});
