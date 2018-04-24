<?php

namespace App\Http\Controllers\WebControllers;

use App\Models\ChamadoPrioridade;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class ChamadoPrioridadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("chamado_prioridade.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chamadoPrioridade = new ChamadoPrioridade();
        return view("chamado_prioridade.create",['chamadoPrioridade'=>$chamadoPrioridade]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\ChamadoPrioridade  $chamadoPrioridade
     * @return \Illuminate\Http\Response
     */
    public function show(ChamadoPrioridade $chamadoPrioridade)
    {
        return view("chamado_prioridade.show", ['chamadoPrioridade'=>$chamadoPrioridade]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChamadoPrioridade  $chamadoPrioridade
     * @return \Illuminate\Http\Response
     */
    public function edit(ChamadoPrioridade $chamadoPrioridade)
    {
        return view("chamado_prioridade.edit", ['chamadoPrioridade'=>$chamadoPrioridade]);
    }
}
