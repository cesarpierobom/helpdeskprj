<?php

namespace App\Http\Controllers\WebControllers;

use App\Models\UsuarioGrupo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsuarioGrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("usuario_grupo.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarioGrupo = new UsuarioGrupo();
        return view("usuario_grupo.create", ['usuario$usuarioGrupo'=>$usuarioGrupo]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UsuarioGrupo  $usuarioGrupo
     * @return \Illuminate\Http\Response
     */
    public function show(UsuarioGrupo $usuarioGrupo)
    {
        return view("usuario_grupo.show", ['usuario$usuarioGrupo'=>$usuarioGrupo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UsuarioGrupo  $usuarioGrupo
     * @return \Illuminate\Http\Response
     */
    public function edit(UsuarioGrupo $usuarioGrupo)
    {
        return view("usuario_grupo.edit", ['usuario$usuarioGrupo'=>$usuarioGrupo]);
    }
}
