<?php

use Faker\Generator as Faker;

$factory->define(App\Servico::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
        'codigo' => $faker->word,
        'status' => $faker->randomElement($array = array ('1','0')),
    ];
});


$factory->define(App\Servico::class, $data, function (Faker $faker) {
    $final = [
        'nome' => $faker->word,
        'codigo' => $faker->word,
        'status' => $faker->randomElement($array = array ('1','0')),
    ];

    if (!empty($data["organizacao"])) {
        $final = array_merge($final, array("organizacao_id"=>$data["organizacao"]));
    }

    return $final;
});
