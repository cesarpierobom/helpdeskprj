<?php

namespace App\Http\Resources\chamado_feedback;

use Illuminate\Http\Resources\Json\JsonResource;

class ChamadoFeedbackResource extends JsonResource
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
