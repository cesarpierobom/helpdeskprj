<?php

use Faker\Generator as Faker;
use App\Models\Chamado;

$factory->define(Chamado::class, function (Faker $faker) {
    return [
        'titulo' => $faker->sentence(),
        'descricao' => $faker->paragraph(),
        'status' => '1',
        'encerrado' => $faker->randomElement($array = array ('1','0')),
    ];
});
