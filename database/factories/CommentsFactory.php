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

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 5),
        'news_id' => rand(1, 5),
        'text' => $faker->realText(rand(10, 300)),
        'likes' => rand(0, 30),
//        'created_at' => $faker->date(),
//        'updated_at' => $faker->date(),
    ];
});
