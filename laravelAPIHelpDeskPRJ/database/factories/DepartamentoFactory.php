<?php

use Faker\Generator as Faker;
use App\Models\Departamento;

$factory->define(Departamento::class, function (Faker $faker) {
    return [
        "nome" => $faker->company,
        "codigo" => $faker->word,
        'status' => '1',
    ];
});
