<?php

namespace App\Http\Resources\user;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\organizacao\OrganizacaoResource;
use App\Http\Resources\user\UserResource;
use App\User;


class UserResourceCollection extends ResourceCollection
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
            "data" => UserResource::collection($this)
        ];
    }
   


    public function with($request)
    {
        return [
            "recordsTotal" => User::count(),
            "recordsFiltered" => $this->count(),
            "draw" => $request->draw
        ];
    }
}
