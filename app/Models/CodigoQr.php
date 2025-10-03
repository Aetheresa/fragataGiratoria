<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CodigoQr
 * 
 * @property int $id_codigo_qr
 * @property string $url_destino
 * @property Carbon $fecha_generacion
 * @property string $estado
 *
 * @package App\Models
 */
class CodigoQr extends Model
{
	protected $table = 'codigo_qr';
	protected $primaryKey = 'id_codigo_qr';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_codigo_qr' => 'int',
		'fecha_generacion' => 'datetime'
	];

	protected $fillable = [
		'url_destino',
		'fecha_generacion',
		'estado'
	];
}
