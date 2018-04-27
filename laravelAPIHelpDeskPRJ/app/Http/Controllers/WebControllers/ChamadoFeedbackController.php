<?php

namespace App\Http\Controllers\WebControllers;

use App\Models\ChamadoFeedback;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChamadoFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("chamado_feedback.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chamadoFeedback = new ChamadoFeedback();
        return view("chamado_feedback.create",['chamadoFeedback'=>$chamadoFeedback]);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\ChamadoFeedback  $chamadoFeedback
     * @return \Illuminate\Http\Response
     */
    public function show(ChamadoFeedback $chamadoFeedback)
    {
        return view("chamado_feedback.show", ['chamadoFeedback'=>$chamadoFeedback]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChamadoFeedback  $chamadoFeedback
     * @return \Illuminate\Http\Response
     */
    public function edit(ChamadoFeedback $chamadoFeedback)
    {
        return view("chamado_feedback.edit", ['chamadoFeedback'=>$chamadoFeedback]);
    }
}
