<?php

namespace App\Http\Controllers\APIControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\watchlist\ListWatchersRequest;
use App\Http\Requests\watchlist\ListTicketsBeingWatched;
use App\Http\Resources\chamado\ChamadoResourceCollection;
use App\Http\Resources\user\UserResourceCollection;
use App\Models\Chamado;
use App\User;

class WatchlistAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listByUser(ListTicketsBeingWatched $request, User $user)
    {
        $query = $user->watching();

        if ($request->has("length") && $request->has("start") && $request->length>=0 && $request->start>=0) {
            $query->skip($request->start);
            $query->take($request->length);
        }

        return new ChamadoResourceCollection($query->get());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listByChamado(ListWatchersRequest $request, Chamado $chamado)
    {
        $query = $chamado->watchers();

        if ($request->has("length") && $request->has("start")) {
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
