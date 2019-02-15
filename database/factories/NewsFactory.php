<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

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

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween(1, 4),
        'user_id' => rand(1, 5),
        'title' => $faker->realText(rand(20,70)),
        'text' => $faker->realText(rand(50,250)),
    ];
});
