<?php

namespace App\Http\Controllers\WebControllers;

use App\Models\SuporteGrupo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuporteGrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("suporte_grupo.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suporteGrupo = new SuporteGrupo();
        return view("suporte_grupo.create", ['suporteGrupo'=>$suporteGrupo]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SuporteGrupo  $suporteGrupo
     * @return \Illuminate\Http\Response
     */
    public function show(SuporteGrupo $suporteGrupo)
    {
        return view("suporte_grupo.show", ['suporteGrupo'=>$suporteGrupo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SuporteGrupo  $suporteGrupo
     * @return \Illuminate\Http\Response
     */
    public function edit(SuporteGrupo $suporteGrupo)
    {
        return view("suporte_grupo.edit", ['suporteGrupo'=>$suporteGrupo]);
    }
}
