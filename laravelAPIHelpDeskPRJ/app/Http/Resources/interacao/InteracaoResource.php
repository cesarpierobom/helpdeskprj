<?php

namespace App\Http\Resources\interacao;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\user\UserResource;

class InteracaoResource extends JsonResource
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
            "descricao" => $this->descricao,
            "chamado_id" => $this->chamado_id,
            "user_id" => $this->user_id,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "deleted_at" => $this->deleted_at,
            "create_user_id" => $this->create_user_id,
            "update_user_id" => $this->update_user_id,
            "delete_user_id" => $this->delete_user_id,
            "usuario" => new UserResource($this->whenLoaded("usuario")),
            "create_user" => new UserResource($this->whenLoaded("usuario_criacao")),
            "update_user" => new UserResource($this->whenLoaded("usuario_update")),
            "delete_user" => new UserResource($this->whenLoaded("usuario_delete")),
            "links" => $this->when($this->id != null, function () {
                return [
                    "self"  =>  route("interacao.show_api", $this->id),
                ];
            })
        ];
    }
}
