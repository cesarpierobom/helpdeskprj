<?php

use Faker\Generator as Faker;

$factory->define(App\ChamadoSLA::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
        'codigo' => $faker->word,
        'status' => $faker->randomElement($array = array ('1','0')),
    ];
});
