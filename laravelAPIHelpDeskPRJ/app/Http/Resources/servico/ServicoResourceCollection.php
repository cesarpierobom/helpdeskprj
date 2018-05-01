<?php

namespace App\Http\Resources\servico;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\servico\ServicoResource;
use App\Models\Servico;


class ServicoResourceCollection extends ResourceCollection
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
            "data" => ServicoResource::collection($this)
        ];
    }


    public function with($request)
    {
        return [
            "recordsTotal" => Servico::count(),
            "recordsFiltered" => $this->count(),
            "draw" => $request->draw
        ];
    }
}
