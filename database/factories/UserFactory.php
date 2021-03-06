<?php

use App\User;
use Illuminate\Support\Str;
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

$factory->define(User::class, function (Faker $faker) {
    $strings = array(
        0,
        1,
    );
    $avatar = ['default.png', 'default-f.png'];
    $age = array(20,21,23,24,25,26,30,25,47,50,16,15,18,19);
    $region = array(1,2,3);
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'job' => 1,
        'city_id' => 1,
        'region_id' => Arr::random($region),
        'gender' => array_rand($strings),
        'phone' => $faker->e164PhoneNumber,
        'avatar' => Arr::random($avatar),
        'age' =>  Arr::random($age),
    ];
});
