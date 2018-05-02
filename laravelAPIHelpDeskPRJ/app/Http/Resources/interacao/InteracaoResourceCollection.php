<?php

namespace App\Http\Resources\interacao;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\interacao\InteracaoResource;
use App\Models\Interacao;

class InteracaoResourceCollection extends ResourceCollection
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
            "data" => InteracaoResource::collection($this)
        ];
    }

    public function with($request)
    {
        return [
            "recordsTotal" => Interacao::count(),
            "recordsFiltered" => $this->count(),
            "draw" => $request->draw
        ];
    }
}
