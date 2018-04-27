<?php

namespace App\Http\Resources\chamado_sla;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\ChamadoSLA;


class ChamadoSLAResourceCollection extends ResourceCollection
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
            "data" => $this->collection->transform( function($sla) {
                return [
                    "id" => $sla->id,
                    "nome" => $sla->nome,
                    "codigo" => $sla->codigo,
                    "status" => $sla->status,
                    "links"   => [
                        "self"  =>  route("chamado_sla.show_api", $sla->id),
                        "self-form" =>  route("chamado_sla.edit", $sla->id),
                    ],
                ];
            }),
        ];
    }


    public function with($request)
    {
        return [
            "recordsTotal" => ChamadoSLA::count(),
            "recordsFiltered" => $this->count(),
            "draw" => $request->draw
        ];
    }
}
