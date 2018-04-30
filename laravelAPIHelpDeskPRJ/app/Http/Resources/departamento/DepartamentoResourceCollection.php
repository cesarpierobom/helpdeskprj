<?php

namespace App\Http\Resources\departamento;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\organizacao\OrganizacaoResource;
use App\Models\Departamento;

class DepartamentoResourceCollection extends ResourceCollection
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
            "data" => $this->collection->transform(function ($departamento) {
                return [
                    "id" => $departamento->id,
                    "nome" => $departamento->nome,
                    "codigo" => $departamento->codigo,
                    "status" => $departamento->status,
                    dd($departamento->whenLoaded('organizacao')),
                    "organizacao" => new OrganizacaoResource($departamento->whenLoaded('organizacao')),
                    "links"   => [
                        "self"  =>  route("departamento.show_api", $departamento->id),
                        "self-form" =>  route("departamento.edit", $departamento->id),
                    ],
                ];
            }),
        ];
    }


    public function with($request)
    {
        return [
            "recordsTotal" => Departamento::count(),
            "recordsFiltered" => $this->count(),
            "draw" => $request->draw
        ];
    }
}
