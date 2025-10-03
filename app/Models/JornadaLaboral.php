<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JornadaLaboral
 * 
 * @property int $id_jornada
 * @property Carbon $hora_inicio
 * @property Carbon $hora_finalizacion
 * @property string $tipo_jornada
 * @property int $id_rol
 * 
 * @property Rol $rol
 *
 * @package App\Models
 */
class JornadaLaboral extends Model
{
	protected $table = 'jornada_laboral';
	protected $primaryKey = 'id_jornada';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_jornada' => 'int',
		'hora_inicio' => 'datetime',
		'hora_finalizacion' => 'datetime',
		'id_rol' => 'int'
	];

	protected $fillable = [
		'hora_inicio',
		'hora_finalizacion',
		'tipo_jornada',
		'id_rol'
	];

	public function rol()
	{
		return $this->belongsTo(Rol::class, 'id_rol');
	}
}
