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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categorias_chamados', 'ChamadoCategoriaController');
Route::resource('chamados', 'ChamadoController');
Route::resource('departamentos', 'DepartamentoController');
Route::resource('feedback_chamados', 'ChamadoFeedbackController');
Route::resource('grupos_suporte', 'SuporteGrupoController');
Route::resource('grupos_usuarios', 'UsuarioGrupoController');
Route::resource('interacoes', 'InteracaoController');
Route::resource('organizacoes', 'OrganizacaoController');
Route::resource('prioridades_chamados', 'ChamadoPrioridadeController');
Route::resource('servicos', 'ServicoController');
Route::resource('situacoes_chamados', 'ChamadoSituacaoController');
Route::resource('sla_chamados', 'ChamadoSLAController');



















