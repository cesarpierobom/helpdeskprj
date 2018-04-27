<?php

namespace App\Http\Controllers\APIControllers;

use App\Models\Interacao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\interacao\InteracaoResourceCollection;
use App\Http\Resources\interacao\InteracaoResource;
use App\Http\Requests\interacao\StoreInteracaoRequest;
use App\Http\Requests\interacao\ListInteracaoRequest;
use App\Http\Requests\interacao\UpdateInteracaoRequest;

class InteracaoAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListInteracaoRequest $request)
    {
        $query = (new Interacao)->newQuery();

        if ($request->filled("chamado_id")) {
            $query->whereIn("chamado_id", $request->input("chamado_id"));
        }

        if ($request->filled("user_id")) {
            $query->whereIn("user_id", $request->input("user_id"));
        }

        if ($request->filled("order.0.column") && $request->filled("order.0.dir")) {
            $columns = $request->input('columns');

            foreach ($request->order as $order) {
                $query->orderBy($columns[$order['column']]['data'], $order['dir']);
            }
        }

        if ($request->filled("length") && $request->filled("start")) {
            $query->take($request->input("length"));
            $query->skip($request->input("start"));
        }

        return new InteracaoResourceCollection($query->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInteracaoRequest $request)
    {
        $interacao = new Interacao();
        $interacao->descricao = $request->descricao;
        $interacao->chamado_id = $request->chamado_id;
        $interacao->user_id = $request->user_id;
        $resultado = $interacao->save();

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido no cadastro do registro."], 400);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Interacao  $interacao
     * @return \Illuminate\Http\Response
     */
    public function show(Interacao $interacao)
    {
        return new InteracaoResource($interacao);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Interacao  $interacao
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInteracaoRequest $request, Interacao $interacao)
    {
        $interacao->descricao = $request->descricao;
        $interacao->chamado_id = $request->chamado_id;
        $interacao->user_id = $request->user_id;
        $resultado = $interacao->save();

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido na atualização do registro."], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Interacao  $interacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interacao $interacao)
    {
        $interacao->delete();
        return response()->json(null, 204);
    }
}
