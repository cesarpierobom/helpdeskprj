<?php

use Faker\Generator as Faker;
use App\Models\Organizacao;

$factory->define(Organizacao::class, function (Faker $faker) {
    $nome = $faker->company . " " . $faker->companySuffix;

    return [
        'nome' => $nome,
        'razao_social' => $nome,
        'documento' => $faker->unique()->ssn,
        'codigo' => $faker->word,
        'status' => '1',
    ];
});
