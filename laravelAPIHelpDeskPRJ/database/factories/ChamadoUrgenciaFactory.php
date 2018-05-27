<?php

use Faker\Generator as Faker;
use App\Models\ChamadoUrgencia;

$factory->define(ChamadoUrgencia::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
        'codigo' => $faker->word,
        'status' => $faker->randomElement($array = array ('1','0')),
    ];
});
