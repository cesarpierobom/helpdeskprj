<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

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

    public function chamado()
    {
        return $this->hasMany('App\Models\Chamado');
    }

    public function organizacao_origem()
    {
        return $this->belongsTo('App\Models\Organizacao');
    }

    public function organizacao_visivel()
    {
        return $this->belongsToMany('App\Models\Organizacao','organizacao_usuario','user_id','organizacao_id');
    }
}