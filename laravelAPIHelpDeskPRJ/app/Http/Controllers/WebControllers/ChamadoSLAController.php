<?php

namespace App\Http\Controllers\WebControllers;

use App\Models\ChamadoSLA;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChamadoSLAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("chamado_sla.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chamadoSLA = new ChamadoSLA();
        return view("chamado_sla.create", ['chamado_sla'=>$chamadoSLA]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChamadoSLA  $chamadoSLA
     * @return \Illuminate\Http\Response
     */
    public function show(ChamadoSLA $chamadoSLA)
    {
        return view("chamado_sla.show", ['chamado_sla'=>$chamadoSLA]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChamadoSLA  $chamadoSLA
     * @return \Illuminate\Http\Response
     */
    public function edit(ChamadoSLA $chamadoSLA)
    {
        return view("chamado_sla.edit", ['chamado_sla'=>$chamadoSLA]);
    }
}
