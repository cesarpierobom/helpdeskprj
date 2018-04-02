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

Route::apiResource('chamado_categoria','APIControllers\ChamadoCategoriaAPIController',
	['names' => ['index' => 'chamado_categoria.index_api', 'show'=>'chamado_categoria.show_api']]
)->parameters(['chamado_categoria' => 'chamadoCategoria']);

Route::apiResource('chamado', 'APIControllers\ChamadoAPIController');
Route::apiResource('departamento', 'APIControllers\DepartamentoAPIController');
Route::apiResource('chamado_feedback', 'APIControllers\ChamadoFeedbackAPIController');
Route::apiResource('suporte_grupo', 'APIControllers\SuporteGrupoAPIController');
Route::apiResource('usuario_grupo', 'APIControllers\UsuarioGrupoAPIController');
Route::apiResource('interacao', 'APIControllers\InteracaoAPIController');
Route::apiResource('organizacao', 'APIControllers\OrganizacaoAPIController');
Route::apiResource('chamado_prioridade', 'APIControllers\ChamadoPrioridadeAPIController');
Route::apiResource('servico', 'APIControllers\ServicoAPIController');
Route::apiResource('chamado_situacao', 'APIControllers\ChamadoSituacaoAPIController');
Route::apiResource('chamado_sla', 'APIControllers\ChamadoSLAAPIController');