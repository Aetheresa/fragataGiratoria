<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EstadoUsuario
 * 
 * @property int $id_estado_usuario
 * @property string $nombre_estado
 * @property string|null $descripcion
 * @property int $id_usuario
 * 
 * @property Usuario $usuario
 *
 * @package App\Models
 */
class EstadoUsuario extends Model
{
	protected $table = 'estado_usuario';
	protected $primaryKey = 'id_estado_usuario';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_estado_usuario' => 'int',
		'id_usuario' => 'int'
	];

	protected $fillable = [
		'nombre_estado',
		'descripcion',
		'id_usuario'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}
}
