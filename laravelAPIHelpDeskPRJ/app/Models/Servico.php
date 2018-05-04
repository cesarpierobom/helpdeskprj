<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servico extends Model
{
    use SoftDeletes;

    protected $table = 'servico';

    protected $primaryKey = "id";

    protected $keyType = 'int';

    protected $guarded = [];

    protected $fillable = [];

    protected $dates = ['created_at','updated_at','deleted_at'];

    protected $dispatchesEvents = [];

    public $incrementing = true;

    public $timestamps = true;

    public function chamado()
    {
        return $this->hasMany('App\Models\Chamado');
    }

    public function organizacao()
    {
        return $this->belongsTo('App\Models\Organizacao');
    }
}
