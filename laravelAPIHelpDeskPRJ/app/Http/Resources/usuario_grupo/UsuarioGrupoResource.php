<?php

namespace App\Http\Resources\usuario_grupo;

use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioGrupoResource extends JsonResource
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
