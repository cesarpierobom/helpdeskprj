<?php

namespace App\Http\Resources\organizacao;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Organizacao;


class OrganizacaoCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "data" => $this->collection->transform( function($organizacao) {
                return [
                    "id" => $organizacao->id,
                    "nome" => $organizacao->nome,
                    "codigo" => $organizacao->codigo,
                    "status" => $organizacao->status,
                    "links"   => [
                        "self"  =>  route("organizacao.show_api", $organizacao->id),
                        "self-form" =>  route("organizacao.edit", $organizacao->id),
                    ],
                ];
            }),
        ];
    }

    public function with($request){
        return [
            "recordsTotal" => Organizacao::count(),
            "recordsFiltered" => $this->count(),
            "draw" => $request->draw
        ];
    }
}
