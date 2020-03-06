<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
    return [
        'name' => 'Thế Văn',
        'avatar' => 'defautl_avatar',
        'email' => 'vothevan96@gmail.com',
        'phone' => '123456789',
        'is_admin' => true,
        'email_verified_at' => now(),
        'password' => Hash::make('123456789'),
        'remember_token' => Str::random(10),
    ];
});
