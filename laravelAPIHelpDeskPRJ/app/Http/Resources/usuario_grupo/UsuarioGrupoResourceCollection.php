<?php

namespace App\Http\Resources\usuario_grupo;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\UsuarioGrupo;


class UsuarioGrupoResourceCollection extends ResourceCollection
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
                        "self"  =>  route("usuario_grupo.show_api", $grupo->id),
                        "self-form" =>  route("usuario_grupo.edit", $grupo->id),
                    ],
                ];
            }),
        ];
    }


    public function with($request)
    {
        return [
            "recordsTotal" => UsuarioGrupo::count(),
            "recordsFiltered" => $this->count(),
            "draw" => $request->draw
        ];
    }
}
