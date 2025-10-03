<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PlatilloProducto
 * 
 * @property int $id_platillo
 * @property int $id_producto
 * @property float $cantidad
 * 
 * @property Platillo $platillo
 * @property Producto $producto
 *
 * @package App\Models
 */
class PlatilloProducto extends Model
{
	protected $table = 'platillo_producto';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_platillo' => 'int',
		'id_producto' => 'int',
		'cantidad' => 'float'
	];

	protected $fillable = [
		'cantidad'
	];

	public function platillo()
	{
		return $this->belongsTo(Platillo::class, 'id_platillo');
	}

	public function producto()
	{
		return $this->belongsTo(Producto::class, 'id_producto');
	}
}
