<?php

namespace App\Http\Resources\chamado_prioridade;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\organizacao\OrganizacaoResource;
use App\Http\Resources\chamado_prioridade\ChamadoPrioridadeResource;
use App\Models\ChamadoPrioridade;

class ChamadoPrioridadeResourceCollection extends ResourceCollection
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
            "data" => ChamadoPrioridadeResource::collection($this),
        ];
    }


    public function with($request)
    {
        return [
            "recordsTotal" => ChamadoPrioridade::count(),
            "recordsFiltered" => $this->count(),
            "draw" => $request->draw
        ];
    }
}
