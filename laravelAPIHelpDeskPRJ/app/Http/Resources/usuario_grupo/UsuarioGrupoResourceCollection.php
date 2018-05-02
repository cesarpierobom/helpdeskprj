<?php

namespace App\Http\Resources\usuario_grupo;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\usuario_grupo\UsuarioGrupoResource;
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
            "data" => UsuarioGrupoResource::collection($this)
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
