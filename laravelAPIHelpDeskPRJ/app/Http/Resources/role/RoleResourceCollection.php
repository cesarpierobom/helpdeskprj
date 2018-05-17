<?php

namespace App\Http\Resources\role;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\role\RoleResource;
use Spatie\Permission\Models\Role;

class RoleResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "data" => RoleResource::collection($this)
        ];
    }

    public function with($request)
    {
        return [
            "recordsTotal" => Role::count(),
            "recordsFiltered" => $this->count(),
            "draw" => $request->draw
        ];
    }
}
