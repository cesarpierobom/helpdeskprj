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

    // return $this->belongsTo('App\User', 'foreign_key', 'other_key');
    // return $this->hasMany('App\Comment', 'foreign_key', 'local_key');


    public function interacoes(){
        return $this->hasMany('App\Models\Interacao','chamado_id','id');
    }

    public function autor(){
        return $this->belongsTo('App\User','autor_id','id');
    }

    public function organizacao(){
        return $this->belongsTo('App\Models\Organizacao','organizacao_id','id');
    }

    public function analista(){
        return $this->belongsTo('App\User','analista_id','id');
    }

    public function responsavel(){
        return $this->belongsTo('App\User','responsavel_id','id');
    }

    public function departamento(){
        return $this->belongsTo('App\Models\Departamento','departamento_id','id');
    }

    public function servico(){
        return $this->belongsTo('App\Models\Servico','servico_id','id');
    }

    public function categoria(){
        return $this->belongsTo('App\Models\ChamadoCategoria','chamado_categoria_id','id');
    }

    public function situacao(){
        return $this->belongsTo('App\Models\ChamadoSituacao','chamado_situacao_id','id');
    }

    public function prioridade(){
        return $this->belongsTo('App\Models\ChamadoPrioridade','chamado_prioridade_id','id');
    }

    public function feedback(){
        return $this->belongsTo('App\Models\ChamadoFeedback','chamado_feedback_id','id');
    }

    public function urgencia(){
        return $this->belongsTo('App\Models\ChamadoUrgencia','chamado_urgencia_id','id');
    }

    public function usuario_criacao(){
        return $this->belongsTo('App\User','create_user_id','id');
    }

    public function usuario_update(){
        return $this->belongsTo('App\User','update_user_id','id');
    }

    public function usuario_delete(){
        return $this->belongsTo('App\User','delete_user_id','id');
    }
    

}
