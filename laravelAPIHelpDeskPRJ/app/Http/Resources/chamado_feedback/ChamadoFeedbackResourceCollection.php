<?php

namespace App\Http\Resources\chamado_feedback;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\organizacao\OrganizacaoResource;
use App\Http\Resources\chamado_feedback\ChamadoFeedbackResource;
use App\Models\ChamadoFeedback;


class ChamadoFeedbackResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "data" => ChamadoFeedbackResource::collection($this)
        ];
    }


    public function with($request)
    {
        return [
            "recordsTotal" => ChamadoFeedback::count(),
            "recordsFiltered" => $this->count(),
            "draw" => $request->draw
        ];
    }
}
