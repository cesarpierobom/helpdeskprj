<?php

use Faker\Generator as Faker;

$factory->define(App\UsuarioGrupo::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
        'codigo' => $faker->word,
        'status' => $faker->randomElement($array = array ('1','0')),
    ];
});


$factory->define(App\UsuarioGrupo::class, $data, function (Faker $faker) use ($factory) {
    $final = $factory->raw(App\UsuarioGrupo::class);

    if (!empty($data["organizacao"])) {
        $final = array_merge($final, array("organizacao_id"=>$data["organizacao"]));
    }

    return $final;
});