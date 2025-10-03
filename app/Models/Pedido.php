<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 * 
 * @property int $id_pedido
 * @property Carbon $fecha_hora
 * @property Carbon|null $tiempo_estimado
 * @property float $total_a_pagar
 * @property string|null $nombre_platillo
 * @property int $id_mesa
 * @property int $id_estado_pedido
 * 
 * @property Mesa $mesa
 * @property EstadoPedido $estado_pedido
 * @property Collection|MetodoDePago[] $metodo_de_pagos
 * @property Collection|NumeroReferencium[] $numero_referencia
 * @property Collection|PedidoDetalle[] $pedido_detalles
 *
 * @package App\Models
 */
class Pedido extends Model
{
	protected $table = 'pedido';
	protected $primaryKey = 'id_pedido';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_pedido' => 'int',
		'fecha_hora' => 'datetime',
		'tiempo_estimado' => 'datetime',
		'total_a_pagar' => 'float',
		'id_mesa' => 'int',
		'id_estado_pedido' => 'int'
	];

	protected $fillable = [
		'fecha_hora',
		'tiempo_estimado',
		'total_a_pagar',
		'nombre_platillo',
		'id_mesa',
		'id_estado_pedido'
	];

	public function mesa()
	{
		return $this->belongsTo(Mesa::class, 'id_mesa');
	}

	public function estado_pedido()
	{
		return $this->belongsTo(EstadoPedido::class, 'id_estado_pedido');
	}

	public function metodo_de_pagos()
	{
		return $this->hasMany(MetodoDePago::class, 'id_pedido');
	}

	public function numero_referencia()
	{
		return $this->hasMany(NumeroReferencium::class, 'id_pedido');
	}

	public function pedido_detalles()
	{
		return $this->hasMany(PedidoDetalle::class, 'id_pedido');
	}
}
