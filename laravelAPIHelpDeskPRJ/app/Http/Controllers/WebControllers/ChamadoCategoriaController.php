<?php

namespace App\Http\Controllers\WebControllers;

use App\Models\ChamadoCategoria;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class ChamadoCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("chamado_categoria.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("chamado_categoria.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChamadoCategoria  $chamadoCategoria
     * @return \Illuminate\Http\Response
     */
    public function show(ChamadoCategoria $chamadoCategoria)
    {
        return view("chamado_categoria.show",['categoria'=>$chamadoCategoria]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChamadoCategoria  $chamadoCategoria
     * @return \Illuminate\Http\Response
     */
    public function edit(ChamadoCategoria $chamadoCategoria)
    {
        return view("chamado_categoria.edit",['categoria'=>$chamadoCategoria]);
    }
}