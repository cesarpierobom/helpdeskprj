<?php

namespace App\Http\Controllers\APIControllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Chamado;
use App\Models\ChamadoSituacao;
use App\Models\ChamadoPrioridade;
use App\Models\ChamadoFeedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\chamado\ChamadoResourceCollection;
use App\Http\Resources\chamado\ChamadoResource;
use App\Http\Requests\chamado\StoreChamadoRequest;
use App\Http\Requests\chamado\ListChamadoRequest;
use App\Http\Requests\chamado\UpdateChamadoRequest;

class ChamadoAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListChamadoRequest $request)
    {
        // php artisan db:seed --class=PermissoesSeeder
        // php artisan db:seed --class=CadastrosIniciaisSeeder

        $query = (new Chamado)->newQuery();
        $query->with("autor");
        $query->with("organizacao");
        $query->with("analista");
        $query->with("responsavel");
        $query->with("servico");
        $query->with("categoria");
        $query->with("situacao");
        $query->with("prioridade");
        $query->with("feedback");
        $query->with("urgencia");
        $query->with("usuario_criacao");
        $query->with("usuario_update");
        $query->with("usuario_delete");

        if ($request->filled("titulo")) {
            $query->where("titulo", "like", "%" . $request->input("titulo") . "%");
        }

        if ($request->filled("search.value")) {
            $query->where("titulo", "like", "%" . $request->input("search.value") . "%");
        }

        if ($request->filled("status")) {
            $query->whereIn("status", $request->input("status"));
        }

        if ($request->filled("organizacao_id")) {
            
            $query->whereIn("organizacao_id", $request->input("organizacao_id"));
        }

        if ($request->filled("servico_id")) {
            $query->whereIn("servico_id", $request->input("servico_id"));
        }

        if ($request->filled("chamado_categoria_id")) {
            $query->whereIn("chamado_categoria_id", $request->input("chamado_categoria_id"));
        }

        if ($request->filled("chamado_situacao_id")) {
            $query->whereIn("chamado_situacao_id", $request->input("chamado_situacao_id"));
        }

        if ($request->filled("pool") && $request->pool == "1") {
            $query->whereNull("analista_id");
        }else{

            if ($request->filled("analista_id")) {
                $query->whereIn("analista_id", $request->input("analista_id"));
            }
    
            if ($request->filled("responsavel_id")) {
                $query->whereIn("responsavel_id", $request->input("responsavel_id"));
            }
    
            if ($request->filled("autor_id")) {
                $query->whereIn("autor_id", $request->input("autor_id"));
            }
        }

        if ($request->filled("chamado_prioridade_id")) {
            $query->whereIn("chamado_prioridade_id", $request->input("chamado_prioridade_id"));
        }

        if ($request->filled("chamado_feedback_id")) {
            $query->whereIn("chamado_feedback_id", $request->input("chamado_feedback_id"));
        }

        if ($request->filled("chamado_urgencia_id")) {
            $query->whereIn("chamado_urgencia_id", $request->input("chamado_urgencia_id"));
        }


        if ($request->filled("order.0.column") && $request->filled("order.0.dir")) {
            $columns = $request->input('columns');

            foreach ($request->order as $order) {
                $query->orderBy($columns[$order['column']]['data'], $order['dir']);
            }
        }

        if ($request->has("length") && $request->has("start") && $request->length>=0 && $request->start>=0) {
            $query->skip($request->start);
            $query->take($request->length);
        }

        // $query1 = $query;
        // dd($query->toSql());

        return new ChamadoResourceCollection($query->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChamadoRequest $request)
    {
        if (!$request->filled("chamado_situacao_id")) {

            $situacao = ChamadoSituacao::firstOrCreate(
                ['nome'=>'NOVO','organizacao_id'=>$request->organizacao_id],
                ['organizacao_id'=>$request->organizacao_id]
            );
            $request->merge(["chamado_situacao_id" => $situacao->id]);
        }
        
        if (!$request->filled("chamado_prioridade_id")) {
            
            $prioridade = ChamadoPrioridade::firstOrCreate(
                ['nome'=>'NORMAL','organizacao_id'=>$request->organizacao_id],
                ['organizacao_id'=>$request->organizacao_id]
            );
            
            $request->merge(["chamado_prioridade_id" => $prioridade->id]);
        }
        
        if (!$request->filled("chamado_feedback_id")) {

            $feedback = ChamadoFeedback::firstOrCreate(
                ['nome'=>'NÃO ATRIBUIDO','organizacao_id'=>$request->organizacao_id],
                ['organizacao_id'=>$request->organizacao_id]
            );

            $request->merge(["chamado_feedback_id" => $feedback->id]);
        }
        
        if (!$request->filled("status")) {
            $request->status = 1;
        }

        $chamado = new Chamado();
        $chamado->titulo = $request->titulo;
        $chamado->descricao = $request->descricao;
        $chamado->analista_id = $request->analista_id;
        $chamado->responsavel_id = $request->responsavel_id;
        if ($request->filled("organizacao_id") && Auth::user()->hasPermissionTo("api setar org chamado","api")) {
            $chamado->organizacao_id = $request->organizacao_id;
        } else {
            $chamado->organizacao_id = Auth::user()->organizacao_id;
        }

        $chamado->organizacao_id = $request->organizacao_id;
        $chamado->servico_id = $request->servico_id;
        $chamado->chamado_categoria_id = $request->chamado_categoria_id;
        $chamado->chamado_urgencia_id = $request->chamado_urgencia_id;
        $chamado->status = $request->status;
        $chamado->encerrado = $request->encerrado;
        $chamado->chamado_situacao_id = $request->chamado_situacao_id;
        $chamado->chamado_prioridade_id = $request->chamado_prioridade_id;
        $chamado->chamado_feedback_id = $request->chamado_feedback_id;
        $chamado->create_user_id = Auth::user()->id;
        $chamado->autor_id = Auth::user()->id;

        $resultado = $chamado->save();

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido no cadastro do registro."], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function show(Chamado $chamado)
    {
        return new ChamadoResource($chamado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChamadoRequest $request, Chamado $chamado)
    {
        if (!$request->filled("chamado_situacao_id")) {

            $request->merge(["chamado_situacao_id" => $chamado->chamado_situacao_id]);
        }
        
        if (!$request->filled("chamado_prioridade_id")) {
            
            $request->merge(["chamado_prioridade_id" => $chamado->chamado_prioridade_id]);
        }
        
        if (!$request->filled("chamado_feedback_id")) {

            $request->merge(["chamado_feedback_id" => $chamado->chamado_feedback_id]);
        }
        
        if (!$request->filled("status")) {
            $request->merge(["status" => $chamado->status]);
        }

        $chamado->titulo = $request->titulo;
        $chamado->descricao = $request->descricao;
        $chamado->analista_id = $request->analista_id;
        $chamado->responsavel_id = $request->responsavel_id;
        $chamado->organizacao_id = $request->organizacao_id;
        $chamado->servico_id = $request->servico_id;
        $chamado->chamado_categoria_id = $request->chamado_categoria_id;
        $chamado->chamado_urgencia_id = $request->chamado_urgencia_id;
        $chamado->status = $request->status;
        $chamado->encerrado = $request->encerrado;
        $chamado->chamado_situacao_id = $request->chamado_situacao_id;
        $chamado->chamado_prioridade_id = $request->chamado_prioridade_id;
        $chamado->chamado_feedback_id = $request->chamado_feedback_id;

        $resultado = $chamado->save();

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido no cadastro do registro."], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chamado $chamado)
    {
        $chamado->delete();
        return response()->json(null, 204);
    }
}
