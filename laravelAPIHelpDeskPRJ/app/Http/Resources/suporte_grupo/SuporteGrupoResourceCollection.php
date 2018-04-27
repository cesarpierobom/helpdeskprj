<?php

namespace App\Http\Resources\suporte_grupo;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\SuporteGrupo;


class SuporteGrupoCollection extends ResourceCollection
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
            "data" => $this->collection->transform( function($grupo) {
                return [
                    "id" => $grupo->id,
                    "nome" => $grupo->nome,
                    "codigo" => $grupo->codigo,
                    "status" => $grupo->status,
                    "links"   => [
                        "self"  =>  route("suporte_grupo.show_api", $grupo->id),
                        "self-form" =>  route("suporte_grupo.edit", $grupo->id),
                    ],
                ];
            }),
        ];
    }


    public function with($request)
    {
        return [
            "recordsTotal" => SuporteGrupo::count(),
            "recordsFiltered" => $this->count(),
            "draw" => $request->draw
        ];
    }
}
