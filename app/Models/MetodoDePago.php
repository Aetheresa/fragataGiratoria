<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MetodoDePago
 * 
 * @property int $id_metodo_pago
 * @property string $nombre_metodo
 * @property int $id_usuario
 * @property int $id_pedido
 * 
 * @property Usuario $usuario
 * @property Pedido $pedido
 *
 * @package App\Models
 */
class MetodoDePago extends Model
{
	protected $table = 'metodo_de_pago';
	protected $primaryKey = 'id_metodo_pago';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_metodo_pago' => 'int',
		'id_usuario' => 'int',
		'id_pedido' => 'int'
	];

	protected $fillable = [
		'nombre_metodo',
		'id_usuario',
		'id_pedido'
	];

	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'id_usuario');
	}

	public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'id_pedido');
	}
}
