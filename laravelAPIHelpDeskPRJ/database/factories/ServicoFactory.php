<?php

use Faker\Generator as Faker;
use App\Models\Servico;

$factory->define(Servico::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
        'codigo' => $faker->word,
        'status' => $faker->randomElement($array = array ('1','0')),
    ];
});
