<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsToMany('App\Models\User');
    }

    public function organizacao()
    {
        return $this->belongsTo('App\Models\Organizacao');
    }
}
