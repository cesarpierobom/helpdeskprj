<?php

namespace App\Http\Resources\suporte_grupo;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\suporte_grupo\SuporteGrupoResource;
use App\Models\SuporteGrupo;

class SuporteGrupoResourceCollection extends ResourceCollection
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
            "data" => SuporteGrupoResource::collection($this),
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
