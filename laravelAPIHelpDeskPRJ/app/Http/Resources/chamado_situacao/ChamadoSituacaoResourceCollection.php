<?php

namespace App\Http\Resources\chamado_situacao;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ChamadoSituacaoResourceCollection extends ResourceCollection
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
