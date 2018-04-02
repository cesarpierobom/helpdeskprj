<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chamado extends Model
{
    protected $guarded = [];

    public function interacoes()
    {
        return $this->hasMany('App\Models\Interacao');
    }

    public function categoria(){
    	return $this->hasOne('App\Models\ChamadoCategoria');
    }

    public function feedback(){
    	return $this->hasOne('App\Models\ChamadoFeedback');
    }

    public function prioridade(){
    	return $this->hasOne('App\Models\ChamadoPrioridade');
    }

    public function situacao(){
    	return $this->hasOne('App\Models\ChamadoSituacao');
    }

    public function sla(){
    	return $this->hasOne('App\Models\ChamadoSLA');
    }

}
