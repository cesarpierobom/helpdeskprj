<?php

namespace App\Http\Resources\chamado_categoria;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\chamado_categoria\ChamadoCategoriaResource;
use App\Models\ChamadoCategoria;

class ChamadoCategoriaCollection extends ResourceCollection
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
            "data" => ChamadoCategoriaResource::collection($this)
        ];
    }


    public function with($request)
    {
        return [
            "recordsTotal" => ChamadoCategoria::count(),
            "recordsFiltered" => $this->count(),
            "draw" => $request->draw
        ];
    }
}
