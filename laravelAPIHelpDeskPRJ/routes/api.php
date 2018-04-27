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
)->parameters(['user' => 'user']);


Route::apiResource(
    'chamado_categoria',
    'APIControllers\ChamadoCategoriaAPIController',
    [
        'names' => [
            'index' => 'chamado_categoria.index_api', 'show'=>'chamado_categoria.show_api'
        ]
    ]
)->parameters(['chamado_categoria' => 'chamadoCategoria']);

Route::apiResource(
    'chamado',
    'APIControllers\ChamadoAPIController',
    [
        'names' => [
            'index' => 'chamado.index_api', 'show'=>'chamado.show_api'
        ]
    ]
)->parameters(['chamado' => 'chamado']);



Route::apiResource(
    'departamento',
    'APIControllers\DepartamentoAPIController',
    [
        'names' => [
            'index' => 'departamento.index_api', 'show'=>'departamento.show_api'
        ]
    ]
)->parameters(['departamento' => 'departamento']);



Route::apiResource(
    'chamado_feedback',
    'APIControllers\ChamadoFeedbackAPIController',
    [
        'names' => [
            'index' => 'departamento.index_api', 'show'=>'departamento.show_api'
        ]
    ]
)->parameters(['chamado_feedback' => 'chamadoFeedback']);




Route::apiResource(
    'suporte_grupo',
    'APIControllers\SuporteGrupoAPIController',
    [
        'names' => [
            'index' => 'suporte_grupo.index_api', 'show'=>'suporte_grupo.show_api'
        ]
    ]
)->parameters(['suporte_grupo' => 'suporteGrupo']);



Route::apiResource(
    'usuario_grupo',
    'APIControllers\UsuarioGrupoAPIController',
    [
        'names' => [
            'index' => 'usuario_grupo.index_api', 'show'=>'usuario_grupo.show_api'
        ]
    ]
)->parameters(['usuario_grupo' => 'usuarioGrupo']);


Route::apiResource(
    'interacao',
    'APIControllers\InteracaoAPIController',
    [
        'names' => [
            'index' => 'interacao.index_api', 'show'=>'interacao.show_api'
        ]
    ]
)->parameters(['interacao' => 'interacao']);



Route::apiResource(
    'organizacao',
    'APIControllers\OrganizacaoAPIController',
    [
        'names' => [
            'index' => 'organizacao.index_api', 'show'=>'organizacao.show_api'
        ]
    ]
)->parameters(['organizacao' => 'organizacao']);



Route::apiResource(
    'chamado_prioridade',
    'APIControllers\ChamadoPrioridadeAPIController',
    [
        'names' => [
            'index' => 'chamado_prioridade.index_api', 'show'=>'chamado_prioridade.show_api'
        ]
    ]
)->parameters(['chamado_prioridade' => 'chamadoPrioridade']);



Route::apiResource(
    'servico',
    'APIControllers\ServicoAPIController',
    [
        'names' => [
            'index' => 'servico.index_api', 'show'=>'servico.show_api'
        ]
    ]
)->parameters(['servico' => 'servico']);




Route::apiResource(
    'chamado_situacao',
    'APIControllers\ChamadoSituacaoAPIController',
    [
        'names' => [
            'index' => 'chamado_situacao.index_api', 'show'=>'chamado_situacao.show_api'
        ]
    ]
)->parameters(['chamado_situacao' => 'chamadoSituacao']);




Route::apiResource(
    'chamado_sla',
    'APIControllers\ChamadoSLAAPIController',
    [
        'names' => [
            'index' => 'chamado_sla.index_api', 'show'=>'chamado_sla.show_api'
        ]
    ]
)->parameters(['chamado_sla' => 'chamadoSLA']);



Route::apiResource(
    'chamado_urgencia',
    'APIControllers\ChamadoUrgenciaAPIController',
    [
        'names' => [
            'index' => 'chamado_urgencia.index_api', 'show'=>'chamado_urgencia.show_api'
        ]
    ]
)->parameters(['chamado_urgencia' => 'chamadoUrgencia']);
