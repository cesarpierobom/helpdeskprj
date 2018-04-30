<?php

namespace App\Http\Resources\chamado_feedback;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\organizacao\OrganizacaoResource;
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
            "data" => $this->collection->transform( function($feedback) {
                return [
                    "id" => $feedback->id,
                    "nome" => $feedback->nome,
                    "codigo" => $feedback->codigo,
                    "status" => $feedback->status,
                    "organizacao" => new OrganizacaoResource($feedback->whenLoaded('organizacao')),
                    "links"   => [
                        "self"  =>  route("chamado_feedback.show_api", $feedback->id),
                        "self-form" =>  route("chamado_feedback.edit", $feedback->id),
                    ],
                ];
            }),
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
