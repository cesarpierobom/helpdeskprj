<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password','login'
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';

    protected $primaryKey = "id";

    protected $keyType = 'int';

    protected $guarded = [];

    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $dispatchesEvents = [];

    public $incrementing = true;

    public $timestamps = true;

    public function autor_chamado()
    {
        return $this->hasMany('App\Models\Chamado');
    }

    public function analista_chamado()
    {
        return $this->hasMany('App\Models\Chamado');
    }

    public function responsavel_chamado()
    {
        return $this->hasMany('App\Models\Chamado');
    }

    public function organizacao_origem()
    {
        return $this->belongsTo('App\Models\Organizacao', "organizacao_id", "id");
    }

    public function organizacao_visivel()
    {
        return $this->belongsToMany('App\Models\Organizacao','organizacao_usuario','user_id','organizacao_id');
    }

    public function watching()
    {
        return $this->belongsToMany('App\Models\Chamado', 'user_chamado', 'user_id', 'chamado_id');
    }

    public function grupos_suporte()
    {
        return $this->belongsToMany('App\Models\SuporteGrupo', 'usuario_suporte_grupo', 'user_id', 'suporte_grupo_id');
    }

    public function grupos_usuario()
    {
        return $this->belongsToMany('App\Models\UsuarioGrupo', 'usuario_usuario_grupo', 'user_id', 'usuario_grupo_id');
    }
}
