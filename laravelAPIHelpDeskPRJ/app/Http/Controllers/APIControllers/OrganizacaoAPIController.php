<?php

namespace App\Http\Controllers\APIControllers;

use App\Models\Organizacao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\organizacao\OrganizacaoCollection;
use App\Http\Resources\organizacao\OrganizacaoResource;
use App\Http\Requests\organizacao\StoreOrganizacaoRequest;
use App\Http\Requests\organizacao\ListOrganizacaoRequest;
use App\Http\Requests\organizacao\UpdateOrganizacaoRequest;

class OrganizacaoAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListOrganizacaoRequest $request)
    {
        $query = (new Organizacao)->newQuery();

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

        return new OrganizacaoCollection($query->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrganizacaoRequest $request)
    {
        $organizacao = new Organizacao();
        $organizacao->nome = $request->nome;
        $organizacao->codigo = $request->codigo;
        $organizacao->documento = $request->documento;
        $organizacao->razao_social = $request->razao_social;
        $organizacao->status = $request->status;
        
        $resultado = $organizacao->save();

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido no cadastro do registro."], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organizacao  $organizacao
     * @return \Illuminate\Http\Response
     */
    public function show(Organizacao $organizacao)
    {
        return new OrganizacaoResource($organizacao);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Organizacao  $organizacao
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrganizacaoRequest $request, Organizacao $organizacao)
    {
        $organizacao->nome = $request->nome;
        $organizacao->codigo = $request->codigo;
        $organizacao->documento = $request->documento;
        $organizacao->razao_social = $request->razao_social;
        $organizacao->status = $request->status;
        $resultado = $organizacao->save();

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido na atualização do registro."], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Organizacao  $organizacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organizacao $organizacao)
    {
        $organizacao->delete();
        return response()->json(null, 204);
    }
}
