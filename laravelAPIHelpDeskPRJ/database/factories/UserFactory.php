<?php

use Faker\Generator as Faker;
use App\User;
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
        'name' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'last_name' => $faker->lastName,
        'login' => $faker->unique()->userName,
        'documento' => $faker->unique()->ssn,
        'api_token' => str_random(100),
        'data_nascimento' => $faker->dateTimeInInterval('-30 years', '+12 years'),
        'sexo' => $faker->randomElement($array = array ('M','F')),
        'status' => '1',
    ];
});
