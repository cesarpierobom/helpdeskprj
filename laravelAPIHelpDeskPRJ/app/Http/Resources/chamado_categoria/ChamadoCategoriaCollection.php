<?php

namespace App\Http\Resources\chamado_categoria;

use Illuminate\Http\Resources\Json\ResourceCollection;
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
            "data" => $this->collection->transform( function($categoria) {
                return [
                    "id" => $categoria->id,
                    "nome" => $categoria->nome,
                    "codigo" => $categoria->codigo,
                    "status" => $categoria->status,
                    "links"   => [
                        "self"  =>  route("chamado_categoria.show_api", $categoria->id),
                        "self-form" =>  route("chamado_categoria.edit", $categoria->id),
                    ],
                ];
            }),
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
