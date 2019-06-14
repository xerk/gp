<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use App\Worker;
use Faker\Generator as Faker;

$factory->define(Worker::class, function (Faker $faker) {
    $strings = array(
        1,2,3,7,8,9,10);
    $exp = array(
        1,
        2,3,4,5,6,7,8,9,10
    );
    $price = array(100,200,300,400,500,600,700,550,50,100);
    return [
        'user_id' => factory(User::class)->create()->id,
        'category_id' => Arr::random($strings),
        'experience' => Arr::random($exp),
        'identifier' => rand(1, 10000000),
        'biography' => $faker->text,
        'price' => Arr::random($price),
    ];
});
