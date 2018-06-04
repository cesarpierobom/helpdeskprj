<?php

use Faker\Generator as Faker;
use App\Models\ChamadoFeedback;

$factory->define(ChamadoFeedback::class, function (Faker $faker) {
    return [
        'nome' => $faker->word,
        'codigo' => $faker->word,
        'status' => '1',
    ];
});
