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

}
