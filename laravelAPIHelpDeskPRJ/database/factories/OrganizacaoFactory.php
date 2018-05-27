<?php

use Faker\Generator as Faker;
use App\Models\Organizacao;

$factory->define(Organizacao::class, function (Faker $faker) {
    return [
        'nome' => $faker->company,
        'razao_social' => $faker->company,
        'documento' => $faker->unique()->ssn,
        'codigo' => $faker->word,
        'status' => $faker->randomElement($array = array ('1','0')),
    ];
});
