<?php

namespace App\Http\Resources\chamado;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\chamado\ChamadoResource;
use App\Models\Chamado;

class ChamadoResourceCollection extends ResourceCollection
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
            "data" => ChamadoResource::collection($this)
        ];
    }

    public function with($request)
    {
        return [
            "recordsTotal" => Chamado::count(),
            "recordsFiltered" => $this->count(),
            "draw" => $request->draw
        ];
    }
}
