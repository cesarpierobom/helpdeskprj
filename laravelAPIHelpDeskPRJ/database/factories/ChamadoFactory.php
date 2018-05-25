<?php

use Faker\Generator as Faker;

$factory->define(App\Chamado::class, function (Faker $faker) {
    return [
        'titulo' => $faker->sentence(),
        'descricao' => $faker->paragraph(),
        'status' => $faker->randomElement($array = array ('1','0')),
        'encerrado' => $faker->randomElement($array = array ('1','0')),
    ];
});
