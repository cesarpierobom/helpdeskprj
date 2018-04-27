<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource(
    'user',
    'APIControllers\UserAPIController',
    [
        'names' => [
            'index' => 'user.index_api', 'show'=>'user.show_api'
        ]
    ]
)->parameters(['user' => 'user'])->middleware("auth:api");


Route::apiResource(
    'chamado_categoria',
    'APIControllers\ChamadoCategoriaAPIController',
    [
        'names' => [
            'index' => 'chamado_categoria.index_api', 'show'=>'chamado_categoria.show_api'
        ]
    ]
)->parameters(['chamado_categoria' => 'chamadoCategoria'])->middleware("auth:api");

Route::apiResource(
    'chamado',
    'APIControllers\ChamadoAPIController',
    [
        'names' => [
            'index' => 'chamado.index_api', 'show'=>'chamado.show_api'
        ]
    ]
)->parameters(['chamado' => 'chamado'])->middleware("auth:api");



Route::apiResource(
    'departamento',
    'APIControllers\DepartamentoAPIController',
    [
        'names' => [
            'index' => 'departamento.index_api', 'show'=>'departamento.show_api'
        ]
    ]
)->parameters(['departamento' => 'departamento'])->middleware("auth:api");



Route::apiResource(
    'chamado_feedback',
    'APIControllers\ChamadoFeedbackAPIController',
    [
        'names' => [
            'index' => 'chamado_feedback.index_api', 'show'=>'chamado_feedback.show_api'
        ]
    ]
)->parameters(['chamado_feedback' => 'chamadoFeedback'])->middleware("auth:api");




Route::apiResource(
    'suporte_grupo',
    'APIControllers\SuporteGrupoAPIController',
    [
        'names' => [
            'index' => 'suporte_grupo.index_api', 'show'=>'suporte_grupo.show_api'
        ]
    ]
)->parameters(['suporte_grupo' => 'suporteGrupo'])->middleware("auth:api");



Route::apiResource(
    'usuario_grupo',
    'APIControllers\UsuarioGrupoAPIController',
    [
        'names' => [
            'index' => 'usuario_grupo.index_api', 'show'=>'usuario_grupo.show_api'
        ]
    ]
)->parameters(['usuario_grupo' => 'usuarioGrupo'])->middleware("auth:api");


Route::apiResource(
    'interacao',
    'APIControllers\InteracaoAPIController',
    [
        'names' => [
            'index' => 'interacao.index_api', 'show'=>'interacao.show_api'
        ]
    ]
)->parameters(['interacao' => 'interacao'])->middleware("auth:api");



Route::apiResource(
    'organizacao',
    'APIControllers\OrganizacaoAPIController',
    [
        'names' => [
            'index' => 'organizacao.index_api', 'show'=>'organizacao.show_api'
        ]
    ]
)->parameters(['organizacao' => 'organizacao'])->middleware("auth:api");



Route::apiResource(
    'chamado_prioridade',
    'APIControllers\ChamadoPrioridadeAPIController',
    [
        'names' => [
            'index' => 'chamado_prioridade.index_api', 'show'=>'chamado_prioridade.show_api'
        ]
    ]
)->parameters(['chamado_prioridade' => 'chamadoPrioridade'])->middleware("auth:api");



Route::apiResource(
    'servico',
    'APIControllers\ServicoAPIController',
    [
        'names' => [
            'index' => 'servico.index_api', 'show'=>'servico.show_api'
        ]
    ]
)->parameters(['servico' => 'servico'])->middleware("auth:api");




Route::apiResource(
    'chamado_situacao',
    'APIControllers\ChamadoSituacaoAPIController',
    [
        'names' => [
            'index' => 'chamado_situacao.index_api', 'show'=>'chamado_situacao.show_api'
        ]
    ]
)->parameters(['chamado_situacao' => 'chamadoSituacao'])->middleware("auth:api");




Route::apiResource(
    'chamado_sla',
    'APIControllers\ChamadoSLAAPIController',
    [
        'names' => [
            'index' => 'chamado_sla.index_api', 'show'=>'chamado_sla.show_api'
        ]
    ]
)->parameters(['chamado_sla' => 'chamadoSLA'])->middleware("auth:api");



Route::apiResource(
    'chamado_urgencia',
    'APIControllers\ChamadoUrgenciaAPIController',
    [
        'names' => [
            'index' => 'chamado_urgencia.index_api', 'show'=>'chamado_urgencia.show_api'
        ]
    ]
)->parameters(['chamado_urgencia' => 'chamadoUrgencia'])->middleware("auth:api");
