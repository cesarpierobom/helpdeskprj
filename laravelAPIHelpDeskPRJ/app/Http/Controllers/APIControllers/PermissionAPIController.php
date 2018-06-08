<?php

namespace App\Http\Controllers\APIControllers;

use Spatie\Permission\Models\Permission; 
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\permission\PermissionResourceCollection;
use App\Http\Resources\permission\PermissionResource;
use App\Http\Requests\permission\ListPermissionRequest;

class PermissionAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListPermissionRequest $request)
    {
        $query = (new Permission)->newQuery();
        $query->with("roles");

        if ($request->filled("role_id")) {

            if (is_array($request->role_id)) {
                $query->whereHas('roles', function ($query) use($request) {
                    $query->whereIn('id', $request->role_id);
                });
            }else{
                $query->whereHas('roles', function ($query) use($request) {
                    $query->where('id', $request->role_id);
                });
            }
        }

        if ($request->filled("name")) {
            $query->where("name", "like", "%" . $request->input("name") . "%");
        }

        if ($request->filled("guard_name")) {
            $query->where("guard_name", "like", "%" . $request->input("guard_name") . "%");
        }

        if ($request->filled("search.value")) {
            $query->where("name", "like", "%" . $request->input("search.value") . "%");
        }

        if ($request->filled("order.0.column") && $request->filled("order.0.dir")) {
            $columns = $request->input('columns');

            foreach ($request->order as $order) {
                $query->orderBy($columns[$order['column']]['data'], $order['dir']);
            }
        }

        if ($request->has("length") && $request->has("start") && $request->length>=0 && $request->start>=0) {
            $query->skip($request->start);
            $query->take($request->length);
        }

        return new PermissionResourceCollection($query->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  Spatie\Permission\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        return new PermissionResource($permission);
    }

}
