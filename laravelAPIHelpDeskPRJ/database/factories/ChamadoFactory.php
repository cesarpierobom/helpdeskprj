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

$factory->define(App\Chamado::class, $data, function (Faker $faker) use ($factory) {
    $final = $factory->raw(App\Chamado::class);

    if (!empty($data["organizacao"])) {
        $final = array_merge($final, array("organizacao_id"=>$data["organizacao"]));
    }

    if (!empty($data["autor"])) {
        $final = array_merge($final, array("autor_id"=>$data["autor"]));
    }

    if (!empty($data["analista"])) {
        $final = array_merge($final, array("analista_id"=>$data["analista"]));
    }

    if (!empty($data["responsavel"])) {
        $final = array_merge($final, array("responsavel_id"=>$data["responsavel"]));
    }

    if (!empty($data["departamento"])) {
        $final = array_merge($final, array("departamento_id"=>$data["departamento"]));
    }

    if (!empty($data["servico"])) {
        $final = array_merge($final, array("servico_id"=>$data["servico"]));
    }

    if (!empty($data["categoria"])) {
        $final = array_merge($final, array("chamado_categoria_id"=>$data["categoria"]));
    }

    if (!empty($data["situacao"])) {
        $final = array_merge($final, array("chamado_situacao_id"=>$data["situacao"]));
    }

    if (!empty($data["prioridade"])) {
        $final = array_merge($final, array("chamado_prioridade_id"=>$data["prioridade"]));
    }

    if (!empty($data["feedback"])) {
        $final = array_merge($final, array("chamado_feedback_id"=>$data["feedback"]));
    }

    if (!empty($data["urgencia"])) {
        $final = array_merge($final, array("chamado_urgencia_id"=>$data["urgencia"]));
    }

    return $final;
});
