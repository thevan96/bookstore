<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;
use App\Genre;
use App\Publisher;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => 'Title '.$faker->sentence(3),
        'author' => $faker->name,
        'description' => $faker->paragraph(3),
        'available_quantity' => $faker->numberBetween(0, 40),
        'sale' => $faker->numberBetween(0, 40),
        'price' => $faker->randomNumber(),
        'publication_date' => $faker->date(),
        'genre_id' => Genre::all()->random()->id,
        'publisher_id' => Publisher::all()->random()->id
    ];
});
