<?php

namespace App\Http\Controllers\APIControllers;

use App\Models\ChamadoUrgencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\chamado_urgencia\ChamadoUrgenciaResourceCollection;
use App\Http\Resources\chamado_urgencia\ChamadoUrgenciaResource;
use App\Http\Requests\chamado_urgencia\StoreChamadoUrgenciaRequest;
use App\Http\Requests\chamado_urgencia\ListChamadoUrgenciaRequest;
use App\Http\Requests\chamado_urgencia\UpdateChamadoUrgenciaRequest;

class ChamadoUrgenciaAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListChamadoUrgenciaRequest $request)
    {
        $query = (new ChamadoUrgencia)->newQuery();
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

        return new ChamadoUrgenciaResourceCollection($query->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChamadoUrgenciaRequest $request)
    {
        $chamadoUrgencia = new ChamadoUrgencia();
        $chamadoUrgencia->nome = $request->nome;
        $chamadoUrgencia->codigo = $request->codigo;
        $chamadoUrgencia->status = $request->status;
        $chamadoUrgencia->organizacao_id = $request->organizacao_id;
        $resultado = $chamadoUrgencia->save();

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido no cadastro do registro."], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChamadoUrgencia  $chamadoUrgencia
     * @return \Illuminate\Http\Response
     */
    public function show(ChamadoUrgencia $chamadoUrgencia)
    {
        return new ChamadoUrgenciaResource($chamadoUrgencia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request         .
     * @param \App\ChamadoUrgencia     $chamadoUrgencia .
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChamadoUrgenciaRequest $request, ChamadoUrgencia $chamadoUrgencia)
    {
        $chamadoUrgencia->nome = $request->nome;
        $chamadoUrgencia->codigo = $request->codigo;
        $chamadoUrgencia->status = $request->status;
        $chamadoUrgencia->organizacao_id = $request->organizacao_id;
        
        $resultado = $chamadoUrgencia->save();

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido na atualização do registro."], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChamadoUrgencia  $chamadoUrgencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChamadoUrgencia $chamadoUrgencia)
    {
        $chamadoUrgencia->delete();
        return response()->json(null, 204);
    }
}
