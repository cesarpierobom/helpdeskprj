<?php

namespace App\Http\Controllers\APIControllers;

use App\Models\Servico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\servico\ServicoResourceCollection;
use App\Http\Resources\servico\ServicoResource;
use App\Http\Requests\servico\StoreServicoRequest;
use App\Http\Requests\servico\ListServicoRequest;
use App\Http\Requests\servico\UpdateServicoRequest;

class ServicoAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListServicoRequest $request)
    {
        $query = (new Servico)->newQuery();
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

        if ($request->filled("organizacao_id")) {
            $query->whereIn("organizacao_id", $request->input("organizacao_id"));
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

        return new ServicoResourceCollection($query->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServicoRequest $request)
    {
        $servico = new Servico();
        $servico->nome = $request->nome;
        $servico->codigo = $request->codigo;
        $servico->status = $request->status;
        $servico->organizacao_id = $request->organizacao_id;
        $resultado = $servico->save();

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido no cadastro do registro."], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function show(Servico $servico)
    {
        return new ServicoResource($servico);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServicoRequest $request, Servico $servico)
    {
        $servico->nome = $request->nome;
        $servico->codigo = $request->codigo;
        $servico->status = $request->status;
        $servico->organizacao_id = $request->organizacao_id;
        
        $resultado = $servico->save();

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido na atualização do registro."], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servico $servico)
    {
        $servico->delete();
        return response()->json(null, 204);
    }
}
