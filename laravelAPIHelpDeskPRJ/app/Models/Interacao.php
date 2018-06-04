<?php

namespace App\Models;

use App\Events\NovaInteracao;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interacao extends Model
{
    use SoftDeletes;

	protected $table = 'interacao';

	protected $primaryKey = "id";

	protected $keyType = 'int';

	protected $guarded = [];

	protected $fillable = [];

	protected $dates = ['created_at','updated_at','deleted_at'];

	protected $dispatchesEvents = [
		'created' => NovaInteracao::class,
	];

	public $incrementing = true;

    public $timestamps = true;

    public function chamado()
    {
    	return $this->belongsTo('App\Models\Chamado',"chamado_id","id");
	}
	
	public function usuario()
    {
    	return $this->belongsTo('App\User',"user_id","id");
    }
}
