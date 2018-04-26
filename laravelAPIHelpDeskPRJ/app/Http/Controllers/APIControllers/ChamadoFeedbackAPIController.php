<?php

namespace App\Http\Controllers\APIControllers;

use App\Models\ChamadoFeedback;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Http\Resources\chamado_feedback\ChamadoFeedbackResourceCollection;
use App\Http\Resources\chamado_feedback\ChamadoFeedbackResource;
use App\Http\Requests\chamado_feedback\ListChamadoFeedbackRequest;
use App\Http\Requests\chamado_feedback\StoreChamadoFeedbackRequest;
use App\Http\Requests\chamado_feedback\UpdateChamadoFeedbackRequest;

class ChamadoFeedbackAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListChamadoFeedbackRequest $request)
    {
        $query = (new ChamadoFeedback)->newQuery();

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

        return new ChamadoFeedbackResourceCollection($query->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChamadoFeedbackRequest $request)
    {
        $chamadoFeedback = new ChamadoFeedback();
        $chamadoFeedback->nome = $request->nome;
        $chamadoFeedback->codigo = $request->codigo;
        $chamadoFeedback->status = $request->status;
        $chamadoFeedback->organizacao_id = $request->organizacao_id;
        
        $resultado = $chamadoFeedback->save();

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido no cadastro do registro."], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChamadoFeedback  $chamadoFeedback
     * @return \Illuminate\Http\Response
     */
    public function show(ChamadoFeedback $chamadoFeedback)
    {
        return new ChamadoFeedbackResource($chamadoFeedback);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ChamadoFeedback  $chamadoFeedback
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChamadoFeedbackRequest $request, ChamadoFeedback $chamadoFeedback)
    {
        $chamadoFeedback->nome = $request->nome;
        $chamadoFeedback->codigo = $request->codigo;
        $chamadoFeedback->status = $request->status;
        $chamadoFeedback->organizacao_id = $request->organizacao_id;
        $resultado = $chamadoFeedback->save();

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido na atualização do registro."], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChamadoFeedback  $chamadoFeedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChamadoFeedback $chamadoFeedback)
    {
        $chamadoFeedback->delete();
        return response()->json(null, 204);
    }
}
