<?php

namespace App\Http\Controllers\WebControllers;

use App\Models\Organizacao;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

class OrganizacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("organizacao.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("organizacao.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Organizacao  $organizacao
     * @return \Illuminate\Http\Response
     */
    public function show(Organizacao $organizacao)
    {
        return view("organizacao.show",['organizacao'=>$organizacao]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Organizacao  $organizacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Organizacao $organizacao)
    {
        return view("organizacao.edit",['organizacao'=>$organizacao]);
    }
}
