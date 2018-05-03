<?php

namespace App\Http\Controllers\APIControllers;

use App\Models\ChamadoPrioridade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\chamado_prioridade\ChamadoPrioridadeResourceCollection;
use App\Http\Resources\chamado_prioridade\ChamadoPrioridadeResource;
use App\Http\Requests\chamado_prioridade\ListChamadoPrioridadeRequest;
use App\Http\Requests\chamado_prioridade\StoreChamadoPrioridadeRequest;
use App\Http\Requests\chamado_prioridade\UpdateChamadoPrioridadeRequest;

class ChamadoPrioridadeAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListChamadoPrioridadeRequest $request)
    {
        $query = (new ChamadoPrioridade)->newQuery();
        $query->with("organizacao");
        
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

        return new ChamadoPrioridadeResourceCollection($query->get());
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChamadoPrioridadeRequest $request)
    {
        $chamadoPrioridade = new ChamadoPrioridade();
        $chamadoPrioridade->nome = $request->nome;
        $chamadoPrioridade->codigo = $request->codigo;
        $chamadoPrioridade->status = $request->status;
        $chamadoPrioridade->organizacao_id = $request->organizacao_id;
        if ($request->padrao == null) {
            $request->padrao = 0;
        }
        $chamadoPrioridade->padrao = $request->padrao;
        $resultado = $chamadoPrioridade->save();

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido no cadastro do registro."], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChamadoPrioridade  $chamadoPrioridade
     * @return \Illuminate\Http\Response
     */
    public function show(ChamadoPrioridade $chamadoPrioridade)
    {
        return new ChamadoPrioridadeResource($chamadoPrioridade);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ChamadoPrioridade  $chamadoPrioridade
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChamadoPrioridadeRequest $request, ChamadoPrioridade $chamadoPrioridade)
    {
        $chamadoPrioridade->nome = $request->nome;
        $chamadoPrioridade->codigo = $request->codigo;
        $chamadoPrioridade->status = $request->status;
        $chamadoPrioridade->organizacao_id = $request->organizacao_id;
        if ($request->padrao == null) {
            $request->padrao = 0;
        }
        $chamadoPrioridade->padrao = $request->padrao;
        $resultado = $chamadoPrioridade->save();

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido na atualização do registro."], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChamadoPrioridade  $chamadoPrioridade
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChamadoPrioridade $chamadoPrioridade)
    {
        $chamadoPrioridade->delete();
        return response()->json(null, 204);
    }
}
