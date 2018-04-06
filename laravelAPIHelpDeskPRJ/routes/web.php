<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::apiResource(
    'user',
    'WebControllers\UserController'
)->parameters(['user' => 'user']);


Route::resource(
    'chamado_categoria',
    'WebControllers\ChamadoCategoriaController'
)->parameters(['chamado_categoria' => 'chamadoCategoria']);

Route::resource(
    'chamado',
    'WebControllers\ChamadoController'
)->parameters(['chamado' => 'chamado']);


Route::resource(
    'departamento',
    'WebControllers\DepartamentoController'
)->parameters(['departamento' => 'departamento']);


Route::resource(
    'chamado_feedback',
    'WebControllers\ChamadoFeedbackController'
)->parameters(['chamado_feedback' => 'chamadoFeedback']);


Route::resource(
    'suporte_grupo',
    'WebControllers\SuporteGrupoController'
)->parameters(['suporte_grupo' => 'suporteGrupo']);


Route::resource(
    'usuario_grupo',
    'WebControllers\UsuarioGrupoController'
)->parameters(['usuario_grupo' => 'usuarioGrupo']);


Route::resource(
    'interacao',
    'WebControllers\InteracaoController'
)->parameters(['interacao' => 'interacao']);


Route::resource(
    'organizacao',
    'WebControllers\OrganizacaoController'
)->parameters(['organizacao' => 'organizacao']);


Route::resource(
    'chamado_prioridade',
    'WebControllers\ChamadoPrioridadeController'
)->parameters(['chamado_prioridade' => 'chamadoPrioridade']);


Route::resource(
    'servico',
    'WebControllers\ServicoController'
)->parameters(['servico' => 'servico']);


Route::resource(
    'chamado_situacao',
    'WebControllers\ChamadoSituacaoController'
)->parameters(['chamado_situacao' => 'chamadoSituacao']);


Route::resource(
    'chamado_sla',
    'WebControllers\ChamadoSLAController'
)->parameters(['chamado_sla' => 'chamadoSLA']);

Route::resource(
    'chamado_urgencia',
    'WebControllers\ChamadoUrgenciaController'
)->parameters(['chamado_urgencia' => 'chamadoUrgencia']);
