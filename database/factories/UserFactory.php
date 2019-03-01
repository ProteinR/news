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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'avatar' => $faker->imageUrl($width = 50, $height = 50, $category = 'people', $fullPath = true),
        'about' => $faker->text(20),
        'interest' => $faker->text(20),
        'skype' => 'skype'. $faker->text(20),
        'telegram' => 'tg'.$faker->text(20),
        'password' => Hash::make('123'),
        'api_token' => str_random(10),
    ];
});
