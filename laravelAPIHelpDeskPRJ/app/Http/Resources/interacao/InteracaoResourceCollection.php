<?php

namespace App\Http\Resources\interacao;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Interacao;


class InteracaoCollection extends ResourceCollection
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
            "data" => $this->collection->transform( function($interacao) {
                return [
                    "id" => $interacao->id,
                    "descricao" => $interacao->descricao,
                    "chamado_id" => $interacao->chamado_id,
                    "user_id" => $interacao->user_id,
                    "created_at" => $interacao->created_at,
                    "updated_at" => $interacao->updated_at,
                    "links"   => [
                        "self"  =>  route("interacao.show_api", $interacao->id),
                        "self-form" =>  route("interacao.edit", $interacao->id),
                    ],
                ];
            }),
        ];
    }

    public function with($request)
    {
        return [
            "recordsTotal" => Interacao::count(),
            "recordsFiltered" => $this->count(),
            "draw" => $request->draw
        ];
    }
}
