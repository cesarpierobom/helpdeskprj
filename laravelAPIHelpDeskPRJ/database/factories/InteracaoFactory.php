<?php

use Faker\Generator as Faker;

$factory->define(App\Interacao::class, function (Faker $faker) {
    return [
        "descricao" => $faker->paragraph(3, true), 
        "publica" => $faker->randomElement($array = array ('1','0')),
    ];
});
