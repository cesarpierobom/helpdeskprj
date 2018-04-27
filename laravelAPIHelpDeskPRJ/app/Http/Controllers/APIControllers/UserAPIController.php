<?php

namespace App\Http\Controllers\APIControllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\user\UserResourceCollection;
use App\Http\Resources\user\UserResource;
use App\Http\Requests\user\StoreUserRequest;
use App\Http\Requests\user\ListUserRequest;
use App\Http\Requests\user\UpdateUserRequest;

class UserAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListUserRequest $request)
    {
        $query = (new User)->newQuery();

        if ($request->filled("name")) {
            $query->where("name", "like", "%" . $request->input("name") . "%");
        }

        if ($request->filled("last_name")) {
            $query->where("last_name", "like", "%" . $request->input("last_name") . "%");
        }

        if ($request->filled("email")) {
            $query->where("email", "like", "%" . $request->input("email") . "%");
        }

        if ($request->filled("login")) {
            $query->where("login", "like", "%" . $request->input("login") . "%");
        }

        if ($request->filled("documento")) {
            $query->where("documento", "like", "%" . $request->input("documento") . "%");
        }
        
        if ($request->filled("search.value")) {
            $query->where("name", "like", "%" . $request->input("search.value") . "%");
            $query->orWhere("last_name", "like", "%" . $request->input("search.value") . "%");
            $query->orWhere("email", "like", "%" . $request->input("search.value") . "%");
            $query->orWhere("login", "like", "%" . $request->input("search.value") . "%");
        }

        if ($request->filled("status")) {
            $query->whereIn("status", $request->input("status"));
        }

        if ($request->filled("organizacao_id")) {
            $query->whereIn("organizacao_id", $request->input("organizacao_id"));
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

        return new UserResourceCollection($query->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->login = $request->login;
        $user->documento = $request->documento;
        $user->sexo = $request->sexo;
        $user->status = $request->status;
        $user->data_nascimento = $request->data_nascimento;
        $user->password = Hash::make($request->password);
        $resultado = $user->save();

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido no cadastro do registro."], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->login = $request->login;
        $user->documento = $request->documento;
        $user->sexo = $request->sexo;
        $user->status = $request->status;
        $user->data_nascimento = $request->data_nascimento;
        $user->password = Hash::make($request->password);
        $resultado = $user->save();

        if ($resultado) {
            return response()->json(null, 204);
        } else {
            return response()->json(["msg"=>"Houve um erro desconhecido na atualização do registro."], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
