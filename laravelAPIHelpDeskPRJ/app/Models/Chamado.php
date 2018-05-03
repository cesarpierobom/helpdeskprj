<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chamado extends Model
{
    use SoftDeletes;

    protected $table = 'chamado';

    protected $primaryKey = "id";

    protected $keyType = 'int';

    protected $guarded = [];

    protected $fillable = [];

    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $dispatchesEvents = [];

    public $incrementing = true;

    public $timestamps = true;

    public function interacoes(){
        return $this->hasMany('App\Models\Interacao');
    }

    public function autor(){
        return $this->belongsTo('App\User');
    }

    public function organizacao(){
        return $this->belongsTo('App\Models\Organizacao');
    }

    public function analista(){
        return $this->belongsTo('App\User');
    }

    public function responsavel(){
        return $this->belongsTo('App\User');
    }

    public function departamento(){
        return $this->belongsTo('App\Models\Departamento');
    }

    public function servico(){
        return $this->belongsTo('App\Models\Servico');
    }

    public function categoria(){
        return $this->belongsTo('App\Models\ChamadoCategoria');
    }

    public function situacao(){
        return $this->belongsTo('App\Models\ChamadoSituacao');
    }

    public function prioridade(){
        return $this->belongsTo('App\Models\ChamadoPrioridade');
    }

    public function feedback(){
        return $this->belongsTo('App\Models\ChamadoFeedback');
    }

    public function urgencia(){
        return $this->belongsTo('App\Models\ChamadoUrgencia');
    }

    public function usuario_criacao(){
        return $this->belongsTo('App\User');
    }

    public function usuario_update(){
        return $this->belongsTo('App\User');
    }

    public function usuario_delete(){
        return $this->belongsTo('App\User');
    }
    

}
