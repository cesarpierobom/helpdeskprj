<?php

namespace App\Http\Resources\chamado_prioridade;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ChamadoPrioridadeResourceCollection extends ResourceCollection
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
