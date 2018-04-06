<?php

namespace App\Http\Resources\chamado_situacao;

use Illuminate\Http\Resources\Json\JsonResource;

class ChamadoSituacaoResource extends JsonResource
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
