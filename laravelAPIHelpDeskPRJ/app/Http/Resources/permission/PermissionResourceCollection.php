<?php

namespace App\Http\Resources\permission;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\permission\PermissionResource;
use Spatie\Permission\Models\Permission;

class PermissionResourceCollection extends ResourceCollection
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
            "data" => PermissionResource::collection($this)
        ];
    }

    public function with($request)
    {
        return [
            "recordsTotal" => Permission::count(),
            "recordsFiltered" => $this->count(),
            "draw" => $request->draw
        ];
    }
}
