<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class DetalleCompra
 * 
 * @property int $id_detalle_compra
 * @property int $id_compra
 * @property int $id_producto
 * @property float $cantidad
 * @property float $precio_unitario
 * 
 * @property Compra $compra
 * @property Producto $producto
 *
 * @package App\Models
 */
class DetalleCompra extends Model
{
	protected $table = 'detalle_compra';
	protected $primaryKey = 'id_detalle_compra';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_detalle_compra' => 'int',
		'id_compra' => 'int',
		'id_producto' => 'int',
		'cantidad' => 'float',
		'precio_unitario' => 'float'
	];

	protected $fillable = [
		'id_compra',
		'id_producto',
		'cantidad',
		'precio_unitario'
	];

	public function compra()
	{
		return $this->belongsTo(Compra::class, 'id_compra');
	}

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'id_producto');
	}
}
