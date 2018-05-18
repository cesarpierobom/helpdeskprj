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

Route::get('/', "WebControllers\ChamadoController@index")->middleware("auth");

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'WebControllers\ChamadoController@index')->name('home');



Route::resource(
    'user',
    'WebControllers\UserController'
)->parameters(['user' => 'user'])->middleware("auth");


Route::resource(
    'role',
    'WebControllers\RoleController'
)->parameters(['role' => 'role'])->middleware("auth");


Route::resource(
    'chamado_categoria',
    'WebControllers\ChamadoCategoriaController'
)->parameters(['chamado_categoria' => 'chamadoCategoria'])->middleware("auth");

Route::resource(
    'chamado',
    'WebControllers\ChamadoController'
)->parameters(['chamado' => 'chamado'])->middleware("auth");


Route::resource(
    'departamento',
    'WebControllers\DepartamentoController'
)->parameters(['departamento' => 'departamento'])->middleware("auth");


Route::resource(
    'chamado_feedback',
    'WebControllers\ChamadoFeedbackController'
)->parameters(['chamado_feedback' => 'chamadoFeedback'])->middleware("auth");


Route::resource(
    'suporte_grupo',
    'WebControllers\SuporteGrupoController'
)->parameters(['suporte_grupo' => 'suporteGrupo'])->middleware("auth");


Route::resource(
    'usuario_grupo',
    'WebControllers\UsuarioGrupoController'
)->parameters(['usuario_grupo' => 'usuarioGrupo'])->middleware("auth");


Route::resource(
    'interacao',
    'WebControllers\InteracaoController'
)->parameters(['interacao' => 'interacao'])->middleware("auth");


Route::resource(
    'organizacao',
    'WebControllers\OrganizacaoController'
)->parameters(['organizacao' => 'organizacao'])->middleware("auth");


Route::resource(
    'chamado_prioridade',
    'WebControllers\ChamadoPrioridadeController'
)->parameters(['chamado_prioridade' => 'chamadoPrioridade'])->middleware("auth");


Route::resource(
    'servico',
    'WebControllers\ServicoController'
)->parameters(['servico' => 'servico'])->middleware("auth");


Route::resource(
    'chamado_situacao',
    'WebControllers\ChamadoSituacaoController'
)->parameters(['chamado_situacao' => 'chamadoSituacao'])->middleware("auth");


Route::resource(
    'chamado_sla',
    'WebControllers\ChamadoSLAController'
)->parameters(['chamado_sla' => 'chamadoSLA'])->middleware("auth");

Route::resource(
    'chamado_urgencia',
    'WebControllers\ChamadoUrgenciaController'
)->parameters(['chamado_urgencia' => 'chamadoUrgencia'])->middleware("auth");


Route::view("/reports/geral", 'reports.geral')->name("report_geral")->middleware("auth");