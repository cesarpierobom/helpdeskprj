<?php

namespace App\Http\Controllers\APIControllers;

use App\Models\ChamadoSituacao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\chamado_situacao\ChamadoSituacaoResourceCollection;
use App\Http\Resources\chamado_situacao\ChamadoSituacaoResource;
use App\Http\Requests\chamado_situacao\StoreChamadoSituacaoRequest;
use App\Http\Requests\chamado_situacao\ListChamadoSituacaoRequest;
use App\Http\Requests\chamado_situacao\UpdateChamadoSituacaoRequest;

class ChamadoSituacaoAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListChamadoSituacaoRequest $request)
    {
        $query = (new ChamadoSituacao)->newQuery();

        if ($request->filled("nome")) {
            $query->where("nome", "like", "%" . $request->input("nome") . "%");
        }

        if ($request->filled("codigo")) {
            $query->where("codigo", "like", "%" . $request->input("codigo") . "%");
        }

        if ($request->filled("search.value")) {
            $query->where("nome", "like", "%" . $request->input("search.value") . "%");
            $query->orWhere("codigo", "like", "%" . $request->input("search.value") . "%");
        }

        if ($request->filled("status")) {
            $query->whereIn("status", $request->input("status"));
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

        return new ChamadoSituacaoResourceCollection($query->get());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChamadoSituacaoRequest $request)
    {
        $chamadoSituacao = new ChamadoSituacao();
        $chamadoSituacao->nome = $request->nome;
        $chamadoSituacao->codigo = $request->codigo;
        $chamadoSituacao->status = $request->status;
        if ($request->padrao == null) {
            $request->padrao = 0;
        }
        $chamadoSituacao->padrao = $request->padrao;
        $resultado = $chamadoSituacao->save();

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido no cadastro do registro."], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChamadoSituacao  $chamadoSituacao
     * @return \Illuminate\Http\Response
     */
    public function show(ChamadoSituacao $chamadoSituacao)
    {
        return new ChamadoSituacaoResource($chamadoSituacao);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ChamadoSituacao  $chamadoSituacao
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChamadoSituacaoRequest $request, ChamadoSituacao $chamadoSituacao)
    {
        $chamadoSituacao = new ChamadoSituacao();
        $chamadoSituacao->nome = $request->nome;
        $chamadoSituacao->codigo = $request->codigo;
        $chamadoSituacao->status = $request->status;
        if ($request->padrao == null) {
            $request->padrao = 0;
        }
        $chamadoSituacao->padrao = $request->padrao;
        $resultado = $chamadoSituacao->save();

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido no cadastro do registro."], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChamadoSituacao  $chamadoSituacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChamadoSituacao $chamadoSituacao)
    {
        $chamadoSituacao->delete();
        return response()->json(null, 204);
    }
}
