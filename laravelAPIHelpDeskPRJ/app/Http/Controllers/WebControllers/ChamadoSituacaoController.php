<?php

namespace App\Http\Controllers\WebControllers;

use App\Models\ChamadoSituacao;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChamadoSituacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("chamado_situacao.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chamadoSituacao = new ChamadoSituacao();
        return view("chamado_situacao.create", ['chamadoSituacao'=>$chamadoSituacao]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChamadoSituacao  $chamadoSituacao
     * @return \Illuminate\Http\Response
     */
    public function show(ChamadoSituacao $chamadoSituacao)
    {
        return view("chamado_situacao.show", ['chamadoSituacao'=>$chamadoSituacao]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChamadoSituacao  $chamadoSituacao
     * @return \Illuminate\Http\Response
     */
    public function edit(ChamadoSituacao $chamadoSituacao)
    {
        return view("chamado_situacao.edit", ['chamadoSituacao'=>$chamadoSituacao]);
    }
}
