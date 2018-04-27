<?php

namespace App\Http\Controllers\WebControllers;

use App\Models\ChamadoUrgencia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChamadoUrgenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("chamado_urgencia.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chamadoUrgencia = new ChamadoUrgencia();
        return view("chamado_urgencia.create", ['chamadoUrgencia'=>$chamadoUrgencia]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChamadoUrgencia  $chamadoUrgencia
     * @return \Illuminate\Http\Response
     */
    public function show(ChamadoUrgencia $chamadoUrgencia)
    {
        return view("chamado_urgencia.show", ['chamadoUrgencia'=>$chamadoUrgencia]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChamadoUrgencia  $chamadoUrgencia
     * @return \Illuminate\Http\Response
     */
    public function edit(ChamadoUrgencia $chamadoUrgencia)
    {
        return view("chamado_urgencia.edit", ['chamadoUrgencia'=>$chamadoUrgencia]);
    }
}
