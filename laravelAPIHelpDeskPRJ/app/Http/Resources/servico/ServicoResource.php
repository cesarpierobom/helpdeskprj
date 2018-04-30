<?php

namespace App\Http\Resources\servico;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\organizacao\OrganizacaoResource;

class ServicoResource extends JsonResource
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
            "nome" => $this->nome,
            "codigo" => $this->codigo,
            "status" => $this->status,
            "organizacao_id" => $this->organizacao_id,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "deleted_at" => $this->deleted_at,
            "organizacao" => new OrganizacaoResource($this->whenLoaded('organizacao')),
            "links" => $this->when($this->id != null, function () {
                return [
                    "self"  =>  route("servico.show_api", $this->id),
                    "self-form" =>  route("servico.edit", $this->id),
                ];
            })
        ];
    }
}
