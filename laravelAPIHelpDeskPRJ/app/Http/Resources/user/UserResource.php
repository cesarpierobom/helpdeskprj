<?php

namespace App\Http\Resources\user;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\organizacao\OrganizacaoResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "last_name" => $this->last_name,
            "email" => $this->email,
            "login" => $this->login,
            "documento" => $this->documento,
            "data_nascimento" => $this->data_nascimento,
            "sexo" => $this->sexo,
            "status" => $this->status,
            "remember_token" => $this->remember_token,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "deleted_at" => $this->deleted_at,
            "api_token" => $this->api_token,
            "organizacao_id" => $this->organizacao_id,
            "organizacao_origem" => new OrganizacaoResource($this->whenLoaded('organizacao_origem')),
            "organizacao_visivel" => OrganizacaoResource::collection($this->whenLoaded('organizacao_visivel')),
            "links" => $this->when($this->id != null, function () {
                return [
                    "self"  =>  route("user.show_api", $this->id),
                    "self-form" =>  route("user.edit", $this->id),
                ];
            })
        ];
    }
}
