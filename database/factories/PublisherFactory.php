<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Publisher;
use Faker\Generator as Faker;

$factory->define(Publisher::class, function (Faker $faker) {
    return [
        'name' => 'Publisher '.$faker->sentence(3),
        'phone' => $faker->phoneNumber,
        'address' => $faker->address
    ];
});
