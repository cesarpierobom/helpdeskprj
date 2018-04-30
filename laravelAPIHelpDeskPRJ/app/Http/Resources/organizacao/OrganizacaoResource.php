<?php

namespace App\Http\Resources\organizacao;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganizacaoResource extends JsonResource
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
            "razao_social" => $this->razao_social,
            "documento" => $this->documento,
            "codigo" => $this->codigo,
            "status" => $this->status,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "deleted_at" => $this->deleted_at,
            "links"   => [
                "self"  =>  route("organizacao.show_api", $this->id),
                "self-form" =>  route("organizacao.edit", $this->id),
            ],
        ];
    }
}
