<?php

namespace App\Http\Resources\chamado_urgencia;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\chamado_urgencia\ChamadoUrgenciaResource;
use App\Models\ChamadoUrgencia;

class ChamadoUrgenciaResourceCollection extends ResourceCollection
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
            "data" => ChamadoUrgenciaResource::collection($this)
        ];
    }

    public function with($request)
    {
        return [
            "recordsTotal" => ChamadoUrgencia::count(),
            "recordsFiltered" => $this->count(),
            "draw" => $request->draw
        ];
    }
}
