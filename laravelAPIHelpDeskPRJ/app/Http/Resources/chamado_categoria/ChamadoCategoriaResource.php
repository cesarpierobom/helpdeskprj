<?php

namespace App\Http\Resources\chamado_categoria;

use Illuminate\Http\Resources\Json\JsonResource;

class ChamadoCategoriaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
