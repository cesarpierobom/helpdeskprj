<?php

use Faker\Generator as Faker;

$factory->define(App\Organizacao::class, function (Faker $faker) {
    return [
        'nome' => $faker->company,
        'razao_social' => $faker->company,
        'documento' => $faker->unique()->ssn,
        'codigo' => $faker->word
    ];
});
