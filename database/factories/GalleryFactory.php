<?php

use App\Models\Attribute;
use App\Models\Color;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Size;
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

$factory->define(Gallery::class, function (Faker $faker) {
    return [
        'active' => true,
        'galleryable_id' => 1,
        'galleryable_type' => 'App/Models/Project',
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'description_ar' => $faker->paragraph,
        'description_en' => $faker->paragraph,
        'cover' => $faker->numberBetween(1, 10) . '.jpeg',
    ];
});
