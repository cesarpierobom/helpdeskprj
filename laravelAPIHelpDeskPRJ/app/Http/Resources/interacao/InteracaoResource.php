<?php

namespace App\Http\Resources\interacao;

use Illuminate\Http\Resources\Json\JsonResource;

class InteracaoResource extends JsonResource
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
