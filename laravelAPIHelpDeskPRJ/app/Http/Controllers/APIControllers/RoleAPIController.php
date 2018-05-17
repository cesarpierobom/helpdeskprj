<?php

namespace App\Http\Controllers\APIControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\Http\Resources\role\RoleResourceCollection;
use App\Http\Resources\role\RoleResource;
use App\Http\Requests\role\ListRoleRequest;
class RoleAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListRoleRequest $request)
    {
        $query = (new Role)->newQuery();

        if ($request->filled("name")) {
            $query->where("name", "like", "%" . $request->input("name") . "%");
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

        if ($request->filled("length") && $request->filled("start")) {
            $query->take($request->input("length"));
            $query->skip($request->input("start"));
        }

        return new RoleResourceCollection($query->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newRole = Role::create(['name' => $request->name]);

        foreach ($request->permission_on as $permission) {
            $newRole->givePermissionTo($permission);
        }

        if ($newRole) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido no cadastro do registro."], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return new RoleResource($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Spatie\Permission\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->name = $request->name;
        $resultado = $role->save();

        $role->syncPermissions($request->permission_on);

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido na atualização do registro."], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Spatie\Permission\Models\Role Role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json(null, 204);
    }
}
