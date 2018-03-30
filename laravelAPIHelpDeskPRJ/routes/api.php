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

Route::resource('categorias_chamados', 'ChamadoCategoriaAPIController');
Route::resource('chamados', 'ChamadoAPIController');
Route::resource('departamentos', 'DepartamentoAPIController');
Route::resource('feedback_chamados', 'ChamadoFeedbackAPIController');
Route::resource('grupos_suporte', 'SuporteGrupoAPIController');
Route::resource('grupos_usuarios', 'UsuarioGrupoAPIController');
Route::resource('interacoes', 'InteracaoAPIController');
Route::resource('organizacoes', 'OrganizacaoAPIController');
Route::resource('prioridades_chamados', 'ChamadoPrioridadeAPIController');
Route::resource('servicos', 'ServicoAPIController');
Route::resource('situacoes_chamados', 'ChamadoSituacaoAPIController');
Route::resource('sla_chamados', 'ChamadoSLAAPIController');