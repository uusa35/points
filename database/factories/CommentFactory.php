<?php

use App\Models\Comment;
use App\Models\Job;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => $faker->name,
        'path' => $faker->name,
        'commentable_id' => Job::all()->random()->id,
        'commentable_type' => 'App\Models\Job',
        'active' => $faker->boolean,
        'viewed' => $faker->boolean,
    ];
});
