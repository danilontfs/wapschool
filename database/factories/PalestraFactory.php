<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Wapschool\Palestra;
use Faker\Generator as Faker;

$factory->define(Palestra::class, function (Faker $faker) {
    return [
        'nome'   => $faker->jobTitle,
        'evento' => $faker->city
    ];
});
