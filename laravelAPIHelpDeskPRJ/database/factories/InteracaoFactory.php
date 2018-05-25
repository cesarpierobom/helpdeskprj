<?php

use Faker\Generator as Faker;

$factory->define(App\Interacao::class, function (Faker $faker) {
    return [
        "descricao" => $faker->paragraph(3, true), 
        "publica" => $faker->randomElement($array = array ('1','0')),
    ];
});

$factory->define(App\Interacao::class, $data, function (Faker $faker) use ($factory) {
    $final = $factory->raw(App\Interacao::class);

    if (!empty($data["chamado"])) {
        $final = array_merge($final, array("chamado_id"=>$data["chamado"]));
    }

    if (!empty($data["user"])) {
        $final = array_merge($final, array("user_id"=>$data["user"]));
    }

    return $final;
});
