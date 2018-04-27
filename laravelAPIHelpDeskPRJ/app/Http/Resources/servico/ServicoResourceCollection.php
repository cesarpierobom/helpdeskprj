<?php

namespace App\Http\Resources\servico;

use Illuminate\Http\Resources\Json\ResourceCollection;
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
            "data" => $this->collection->transform( function($servico) {
                return [
                    "id" => $servico->id,
                    "nome" => $servico->nome,
                    "codigo" => $servico->codigo,
                    "status" => $servico->status,
                    "links"   => [
                        "self"  =>  route("servico.show_api", $servico->id),
                        "self-form" =>  route("servico.edit", $servico->id),
                    ],
                ];
            }),
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
