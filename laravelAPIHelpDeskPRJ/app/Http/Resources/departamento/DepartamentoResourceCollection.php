<?php

namespace App\Http\Resources\departamento;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\departamento\DepartamentoResource;
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
            "data" => DepartamentoResource::collection($this)
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
