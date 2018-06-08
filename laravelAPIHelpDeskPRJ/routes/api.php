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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

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
    'role',
    'APIControllers\RoleAPIController',
    [
        'names' => [
            'index' => 'role.index_api', 'show'=>'role.show_api'
        ]
    ]
)->parameters(['role' => 'role'])->middleware("auth:api");;

Route::apiResource(
    'permission',
    'APIControllers\PermissionAPIController',
    [
        'names' => [
            'index' => 'permission.index_api', 'show'=>'permission.show_api'
        ]
    ]
)->parameters(['permission' => 'permission'])->middleware("auth:api");

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


Route::get('chamado/{chamado}/interacoes','APIControllers\InteracaoAPIController@listByChamado')->middleware("auth:api");
Route::get('user/{user}/notifications','APIControllers\NotificationsAPIController@listByUser')->middleware("auth:api");
Route::get('user/{user}/watchlist','APIControllers\WatchlistAPIController@listByUser')/*->middleware("auth:api")*/;
Route::get('chamado/{chamado}/watchers','APIControllers\WatchlistAPIController@listByChamado')/*->middleware("auth:api")*/;






Route::get('relatorio/geral', function (Request $request) {
    $count = App\Models\Organizacao::count();
    $query = (new App\Models\Organizacao)->newQuery();
    
    if ($request->filled("organizacao")) {
        $query->whereIn("id", $request->organizacao);
    }
    
    $organizacoes = $query->get();

    if ($request->filled("organizacao")) {
        $filtered = count($request->organizacao);
    } else {
        $filtered = count($organizacoes);
    }

    // dd($organizacoes);
    $final = array();
    $i = 0;

    foreach ($organizacoes as $key => $value) {

        $queryTotal = App\Models\Chamado::where("organizacao_id", $value->id);
        $queryAbertos = App\Models\Chamado::where("encerrado", "=", "0")->where("organizacao_id", $value->id);
        $queryEncerrados = App\Models\Chamado::where("encerrado", "=", "1")->where("organizacao_id", $value->id);
        // $queryTempo = App\Models\Chamado::where("organizacao_id", $value->id);

        if ($request->filled("periodode") && $request->filled("periodoate")) {
            $queryTotal->whereBetween("created_at", [$request->periodode,$request->periodoate]);
            $queryAbertos->whereBetween("created_at", [$request->periodode,$request->periodoate]);
            $queryEncerrados->whereBetween("created_at", [$request->periodode,$request->periodoate]);
            // $queryTempo->whereBetween("created_at",[$request->filled("periodode"),$request->filled("periodoate")]);
        }
        $final['data'][$i]["nome"] = $value->nome;
        $final['data'][$i]["total"] = $queryTotal->count();
        $final['data'][$i]["abertos"] = $queryAbertos->count();
        $final['data'][$i]["encerrados"] = $queryEncerrados->count();
        
        if ($final['data'][$i]["abertos"] != 0 && $final['data'][$i]["total"] != 0) {
            $final['data'][$i]["abertos_porcentagem"] = ($final['data'][$i]["abertos"]/$final['data'][$i]["total"])*100;
            $final['data'][$i]["abertos_porcentagem"] = number_format($final['data'][$i]["abertos_porcentagem"], 2, ',', '.') . "%";
        } else {
            $final['data'][$i]["abertos_porcentagem"] = "";
        }
        
        if ($final['data'][$i]["encerrados"] != 0 && $final['data'][$i]["total"] != 0) {
            $final['data'][$i]["encerrados_porcentagem"] = ($final['data'][$i]["encerrados"]/$final['data'][$i]["total"])*100;
            $final['data'][$i]["encerrados_porcentagem"] = number_format($final['data'][$i]["encerrados_porcentagem"], 2, ',', '.') . "%";
        } else {
            $final['data'][$i]["encerrados_porcentagem"] = "";
        }
        $final['data'][$i]["tempo"] = "";
        
        // $final[$i]["total_periodo"] = App\Models\Chamado::where("encerrado", "=", "1")->where("organizacao_id",$value->id)->count();
        // $final[$i]["abertos_periodo"] = App\Models\Chamado::where("encerrado", "=", "1")->where("organizacao_id",$value->id)->count();
        // $final[$i]["encerrados_periodo"] = App\Models\Chamado::where("encerrado", "=", "0")->where("organizacao_id",$value->id)->count();
        // $final[$i]["tempo_periodo"] = App\Models\Chamado::where("encerrado", "=", "0")->where("organizacao_id",$value->id)->count();
        $i++;
    }

    $final["recordsTotal"] = $count;
    $final["recordsFiltered"] = $filtered;
    $final["draw"] = $request->draw;

    return $final;

})->name("report_geral_api");



Route::get('relatorio/categorias', function (Request $request) {

    $organizacao = App\Models\Organizacao::where("id", $request->organizacao)->get();

    $categorias = App\Models\ChamadoCategoria::all();

    $i = 0;
    $total=0;

    foreach ($categorias as $key => $categoria) {
        $final['data'][$i]['total'] = App\Models\Chamado::where("chamado_categoria_id", $categoria->id)->where("organizacao_id", $request->organizacao)->count();
        $final['data'][$i]['nome'] = $categoria->nome;
        $total += $final['data'][$i]['total'];
        $i++;
    }

    $final["recordsTotal"] = $total;
    $final["recordsFiltered"] = $total;
    $final["draw"] = $request->draw;

    return $final;

})->name("report_categorias_api");