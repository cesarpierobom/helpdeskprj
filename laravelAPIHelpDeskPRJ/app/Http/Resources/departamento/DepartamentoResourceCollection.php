<?php

namespace App\Http\Resources\departamento;

use Illuminate\Http\Resources\Json\ResourceCollection;

class DepartamentoResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
