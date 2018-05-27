<?php

use Faker\Generator as Faker;
use App\Models\SuporteGrupo;

$factory->define(SuporteGrupo::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
        'codigo' => $faker->word,
        'status' => $faker->randomElement($array = array ('1','0')),
    ];
});
