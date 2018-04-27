<?php

namespace App\Http\Resources\user;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\User;


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
            "data" => $this->collection->transform( function($user) {
                return [
                    "id" => $user->id,
                    "name" => $user->name,
                    "last_name" => $user->last_name,
                    "email" => $user->email,
                    "login" => $user->login,
                    "documento" => $user->documento,
                    "data_nascimento" => $user->data_nascimento,
                    "sexo" => $user->sexo,
                    "status" => $user->status,
                    "created_at" => $user->created_at,
                    "updated_at" => $user->updated_at,
                    "links"   => [
                        "self"  =>  route("user.show_api", $user->id),
                        "self-form" =>  route("user.edit", $user->id),
                    ],
                ];
            }),
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
