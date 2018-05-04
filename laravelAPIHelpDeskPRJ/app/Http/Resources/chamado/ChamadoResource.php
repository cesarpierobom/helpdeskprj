<?php

namespace App\Http\Resources\chamado;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\user\UserResource;
use App\Http\Resources\organizacao\OrganizacaoResource;
use App\Http\Resources\departamento\DepartamentoResource;
use App\Http\Resources\servico\ServicoResource;
use App\Http\Resources\chamado_categoria\ChamadoCategoriaResource;
use App\Http\Resources\chamado_situacao\ChamadoSituacaoResource;
use App\Http\Resources\chamado_prioridade\ChamadoPrioridadeResource;
use App\Http\Resources\chamado_feedback\ChamadoFeedbackResource;
use App\Http\Resources\chamado_urgencia\ChamadoUrgenciaResource;

class ChamadoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "titulo" => $this->titulo,
            "descricao" => $this->descricao,
            "status" => $this->status,
            "autor_id" => $this->autor_id,
            "analista_id" => $this->analista_id,
            "responsavel_id" => $this->responsavel_id,
            "organizacao_id" => $this->organizacao_id,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "deleted_at" => $this->deleted_at,
            "departamento_id" => $this->departamento_id,
            "servico_id" => $this->servico_id,
            "chamado_categoria_id" => $this->chamado_categoria_id,
            "chamado_situacao_id" => $this->chamado_situacao_id,
            "chamado_prioridade_id" => $this->chamado_prioridade_id,
            "chamado_feedback_id" => $this->chamado_feedback_id,
            "chamado_urgencia_id" => $this->chamado_urgencia_id,
            "create_user_id" => $this->create_user_id,
            "update_user_id" => $this->update_user_id,
            "delete_user_id" => $this->delete_user_id,
            "autor" => new UserResource($this->whenLoaded("autor")),
            "analista" => new UserResource($this->whenLoaded("analista")),
            "responsavel" => new UserResource($this->whenLoaded("responsavel")),
            "organizacao" => new OrganizacaoResource($this->whenLoaded("organizacao")),
            "departamento" => new DepartamentoResource($this->whenLoaded("departamento")),
            "servico" => new ServicoResource($this->whenLoaded("servico")),
            "chamado_categoria" => new ChamadoCategoriaResource($this->whenLoaded("categoria")),
            "chamado_situacao" => new ChamadoSituacaoResource($this->whenLoaded("situacao")),
            "chamado_prioridade" => new ChamadoPrioridadeResource($this->whenLoaded("prioridade")),
            "chamado_feedback" => new ChamadoFeedbackResource($this->whenLoaded("feedback")),
            "chamado_urgencia" => new ChamadoUrgenciaResource($this->whenLoaded("urgencia")),
            "create_user" => new UserResource($this->whenLoaded("usuario_criacao")),
            "update_user" => new UserResource($this->whenLoaded("usuario_update")),
            "delete_user" => new UserResource($this->whenLoaded("usuario_delete")),
            "links" => $this->when($this->id != null, function () {
                return [
                    "self"  =>  route("chamado.show", $this->id),
                    "self-api"  =>  route("chamado.show_api", $this->id),
                    "self-form" =>  route("chamado.edit", $this->id),
                ];
            })
        ];
    }
}
