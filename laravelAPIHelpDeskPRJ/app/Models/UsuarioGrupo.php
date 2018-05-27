<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsuarioGrupo extends Model
{
    use SoftDeletes;

    protected $table = 'usuario_grupo';

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
        return $this->belongsToMany('App\User', "usuario_usuario_grupo", "usuario_grupo_id", "user_id");
    }

    public function organizacao()
    {
        return $this->belongsTo('App\Models\Organizacao');
    }
}
