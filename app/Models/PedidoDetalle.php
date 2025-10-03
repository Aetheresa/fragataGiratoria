<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PedidoDetalle
 * 
 * @property int $id_detalle
 * @property int $id_pedido
 * @property int|null $id_platillo
 * @property int|null $id_bebida
 * @property int|null $id_adicional
 * @property int $cantidad
 * 
 * @property Pedido $pedido
 * @property Platillo|null $platillo
 * @property Bebida|null $bebida
 * @property Adicionale|null $adicionale
 *
 * @package App\Models
 */
class PedidoDetalle extends Model
{
	protected $table = 'pedido_detalle';
	protected $primaryKey = 'id_detalle';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_detalle' => 'int',
		'id_pedido' => 'int',
		'id_platillo' => 'int',
		'id_bebida' => 'int',
		'id_adicional' => 'int',
		'cantidad' => 'int'
	];

	protected $fillable = [
		'id_pedido',
		'id_platillo',
		'id_bebida',
		'id_adicional',
		'cantidad'
	];

	public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'id_pedido');
	}

	public function platillo()
	{
		return $this->belongsTo(Platillo::class, 'id_platillo');
	}

	public function bebida()
	{
		return $this->belongsTo(Bebida::class, 'id_bebida');
	}

	public function adicionale()
	{
		return $this->belongsTo(Adicionale::class, 'id_adicional');
	}
}
