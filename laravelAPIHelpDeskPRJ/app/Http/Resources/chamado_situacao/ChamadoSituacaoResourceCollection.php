<?php

namespace App\Http\Resources\chamado_situacao;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\organizacao\OrganizacaoResource;
use App\Models\ChamadoSituacao;


class ChamadoSituacaoResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "data" => $this->collection->transform( function($situacao) {
                return [
                    "id" => $situacao->id,
                    "nome" => $situacao->nome,
                    "codigo" => $situacao->codigo,
                    "status" => $situacao->status,
                    "organizacao" => new OrganizacaoResource($situacao->whenLoaded('organizacao')),
                    "links"   => [
                        "self"  =>  route("chamado_situacao.show_api", $situacao->id),
                        "self-form" =>  route("chamado_situacao.edit", $situacao->id),
                    ],
                ];
            }),
        ];
    }


    public function with($request)
    {
        return [
            "recordsTotal" => ChamadoSituacao::count(),
            "recordsFiltered" => $this->count(),
            "draw" => $request->draw
        ];
    }
}
