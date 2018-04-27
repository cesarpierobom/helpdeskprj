<?php

namespace App\Http\Controllers\WebControllers;

use App\Models\Chamado;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChamadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("chamado.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chamado = new Chamado();
        return view("chamado.create", ['chamado'=>$chamado]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function show(Chamado $chamado)
    {
        return view("chamado.show", ['chamado'=>$chamado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chamado  $chamado
     * @return \Illuminate\Http\Response
     */
    public function edit(Chamado $chamado)
    {
        return view("chamado.edit", ['chamado'=>$chamado]);
    }

}
