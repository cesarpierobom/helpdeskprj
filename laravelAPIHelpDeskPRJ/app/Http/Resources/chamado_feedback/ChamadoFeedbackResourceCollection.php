<?php

namespace App\Http\Resources\chamado_feedback;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ChamadoFeedbackResourceCollection extends ResourceCollection
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
