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


Route::apiResource(
    'user', 'WebControllers\UserController'
)->parameters(['user' => 'user']);


Route::resource('chamado_categoria','WebControllers\ChamadoCategoriaController')->parameters(['chamado_categoria' => 'chamadoCategoria']);

Route::resource('chamado', 'WebControllers\ChamadoController');
Route::resource('departamento', 'WebControllers\DepartamentoController');
Route::resource('chamado_feedback', 'WebControllers\ChamadoFeedbackController');
Route::resource('suporte_grupo', 'WebControllers\SuporteGrupoController');
Route::resource('usuario_grupo', 'WebControllers\UsuarioGrupoController');
Route::resource('interacao', 'WebControllers\InteracaoController');
Route::resource('organizacao', 'WebControllers\OrganizacaoController');
Route::resource('chamado_prioridade', 'WebControllers\ChamadoPrioridadeController');
Route::resource('servico', 'WebControllers\ServicoController');
Route::resource('chamado_situacao', 'WebControllers\ChamadoSituacaoController');
Route::resource('chamado_sla', 'WebControllers\ChamadoSLAController');
















