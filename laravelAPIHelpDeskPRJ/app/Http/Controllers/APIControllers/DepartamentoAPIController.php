<?php

namespace App\Http\Controllers\APIControllers;

use App\Models\Departamento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\departamento\DepartamentoResourceCollection;
use App\Http\Resources\departamento\DepartamentoResource;
use App\Http\Requests\departamento\StoreDepartamentoRequest;
use App\Http\Requests\departamento\ListDepartamentoRequest;
use App\Http\Requests\departamento\UpdateDepartamentoRequest;

class DepartamentoAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListDepartamentoRequest $request)
    {
        $query = (new Departamento)->newQuery();

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
        return new DepartamentoResourceCollection($query->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartamentoRequest $request)
    {
        $departamento = new Departamento();
        $departamento->nome = $request->nome;
        $departamento->codigo = $request->codigo;
        $departamento->status = $request->status;
        $departamento->organizacao_id = $request->organizacao_id;
        $resultado = $departamento->save();

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido no cadastro do registro."], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function show(Departamento $departamento)
    {
        return new DepartamentoResource($departamento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepartamentoRequest $request, Departamento $departamento)
    {
        $departamento->nome = $request->nome;
        $departamento->codigo = $request->codigo;
        $departamento->status = $request->status;
        $departamento->organizacao_id = $request->organizacao_id;
        
        $resultado = $departamento->save();

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido na atualização do registro."], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Departamento  $departamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Departamento $departamento)
    {
        $departamento->delete();
        return response()->json(null, 204);
    }
}
