<?php

namespace App\Http\Resources\chamado;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ChamadoResourceCollection extends ResourceCollection
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
