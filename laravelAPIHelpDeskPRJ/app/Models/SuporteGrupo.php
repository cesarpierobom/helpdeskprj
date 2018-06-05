<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuporteGrupo extends Model
{
    use SoftDeletes;

    protected $table = 'suporte_grupo';

    protected $primaryKey = "id";

    protected $keyType = 'int';

    protected $guarded = [];

    protected $fillable = [];

    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $dispatchesEvents = [];

    public $incrementing = true;

    public $timestamps = true;

    public function usuarios()
    {
        return $this->belongsToMany('App\User', "usuario_suporte_grupo", "suporte_grupo_id", "user_id");
    }
}
