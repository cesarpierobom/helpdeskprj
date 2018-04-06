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
    
    public function interacoes()
    {
        return $this->hasMany('App\Models\Interacao');
    }

    public function categoria()
    {
        return $this->hasOne('App\Models\ChamadoCategoria');
    }

    public function feedback()
    {
        return $this->hasOne('App\Models\ChamadoFeedback');
    }

    public function prioridade()
    {
        return $this->hasOne('App\Models\ChamadoPrioridade');
    }

    public function situacao()
    {
        return $this->hasOne('App\Models\ChamadoSituacao');
    }

    public function sla()
    {
        return $this->hasOne('App\Models\ChamadoSLA');
    }

    public function urgencia()
    {
        return $this->hasOne('App\Models\ChamadoUrgencia');
    }

    public function departamento()
    {
        return $this->hasOne('App\Models\Departamento');
    }

    public function servico()
    {
        return $this->hasOne('App\Models\Servico');
    }
}
