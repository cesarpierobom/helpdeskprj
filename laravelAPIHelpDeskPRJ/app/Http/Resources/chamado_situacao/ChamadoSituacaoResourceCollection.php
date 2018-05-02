<?php

namespace App\Http\Resources\chamado_situacao;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\organizacao\OrganizacaoResource;
use App\Http\Resources\chamado_situacao\ChamadoSituacaoResource;
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
            "data" => ChamadoSituacaoResource::collection($this)
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
