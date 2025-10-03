<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EstadoPedido
 * 
 * @property int $id_estado_pedido
 * @property string $nombre_estado
 * @property string|null $descripcion
 * 
 * @property Collection|Pedido[] $pedidos
 *
 * @package App\Models
 */
class EstadoPedido extends Model
{
	protected $table = 'estado_pedido';
	protected $primaryKey = 'id_estado_pedido';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_estado_pedido' => 'int'
	];

	protected $fillable = [
		'nombre_estado',
		'descripcion'
	];

	public function pedidos()
	{
		return $this->hasMany(Pedido::class, 'id_estado_pedido');
	}
}
