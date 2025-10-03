<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Password
 * 
 * @property int $id_password
 * @property string $password
 * @property Carbon $fecha_creacion
 * @property Carbon|null $fecha_actualizacion
 *
 * @package App\Models
 */
class Password extends Model
{
	protected $table = 'password';
	protected $primaryKey = 'id_password';
	public $timestamps = false;

	protected $casts = [
		'fecha_creacion' => 'datetime',
		'fecha_actualizacion' => 'datetime'
	];

	protected $hidden = [
		'id_password',
		'password'
	];

	protected $fillable = [
		'password',
		'fecha_creacion',
		'fecha_actualizacion'
	];
}
