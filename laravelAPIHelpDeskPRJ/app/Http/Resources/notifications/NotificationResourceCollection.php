<?php

namespace App\Http\Resources\notifications;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\notifications\NotificationResource;

class NotificationResourceCollection extends ResourceCollection
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
            "data" => NotificationResource::collection($this)
        ];
    }

    public function with($request)
    {
        return [
            "recordsTotal" => $this->count(),
            "recordsFiltered" => $this->count(),
            "draw" => $request->draw
        ];
    }
}
