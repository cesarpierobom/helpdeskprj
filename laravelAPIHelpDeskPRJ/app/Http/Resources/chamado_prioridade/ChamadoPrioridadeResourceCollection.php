<?php

namespace App\Http\Resources\chamado_prioridade;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\ChamadoPrioridade;


class ChamadoPrioridadeCollection extends ResourceCollection
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
            "data" => $this->collection->transform( function($prioridade) {
                return [
                    "id" => $prioridade->id,
                    "nome" => $prioridade->nome,
                    "codigo" => $prioridade->codigo,
                    "status" => $prioridade->status,
                    "links"   => [
                        "self"  =>  route("chamado_prioridade.show_api", $prioridade->id),
                        "self-form" =>  route("chamado_prioridade.edit", $prioridade->id),
                    ],
                ];
            }),
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
