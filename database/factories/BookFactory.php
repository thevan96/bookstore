<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;
use App\Genre;
use App\Publisher;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => 'Title ' . $faker->sentence(3),
        'author' => $faker->name,
        'description' => $faker->paragraph(3),
        'available_quantity' => $faker->numberBetween(0, 30),
        'sale' => [0, 10, 20, 30][array_rand([0, 10, 20, 30])],
        'price' => (int) $faker->numberBetween(20, 400) * 1000,
        'publication_date' => $faker->date(),
        'genre_id' => Genre::all()->random()->id,
        'publisher_id' => Publisher::all()->random()->id
    ];
});
