<?php

namespace App\Http\Resources\organizacao;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Organizacao;
use App\Http\Resources\organizacao\OrganizacaoResource;

class OrganizacaoCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            "data" => OrganizacaoResource::collection($this)
        ];
    }

    public function with($request){
        return [
            "recordsTotal" => Organizacao::count(),
            "recordsFiltered" => $this->count(),
            "draw" => $request->draw
        ];
    }
}
