<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organizacao extends Model
{
    use SoftDeletes;

    protected $table = 'organizacao';

    protected $primaryKey = "id";

    protected $keyType = 'int';

    protected $guarded = [];

    protected $fillable = [];

    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $dispatchesEvents = [];

    public $incrementing = true;

    public $timestamps = true;

    public function departamentos()
    {
        return $this->hasMany('App\Models\Departamento');
    }
    
    public function categorias()
    {
        return $this->hasMany('App\Models\ChamadoCategoria');
    }
    
    public function feedbacks()
    {
        return $this->hasMany('App\Models\ChamadoFeedback');
    }
    
    public function prioridades()
    {
        return $this->hasMany('App\Models\ChamadoPrioridades');
    }
    
    public function situacoes()
    {
        return $this->hasMany('App\Models\ChamadoSituacao');
    }
    
    public function slas()
    {
        return $this->hasMany('App\Models\ChamadoSLA');
    }
    
    public function urgencias()
    {
        return $this->hasMany('App\Models\ChamadoUrgencia');
    }
    
    public function servicos()
    {
        return $this->hasMany('App\Models\Servico');
    }
    
    public function suporteGrupos()
    {
        return $this->hasMany('App\Models\SuporteGrupo');
    }
    
    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function usuario_visivel()
    {
        return $this->belongsToMany('App\User','organizacao_usuario','organizacao_id','user_id');
    }
}
