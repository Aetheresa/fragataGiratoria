<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Platillo
 * 
 * @property int $id_platillo
 * @property string $nombre_platillo
 * @property float $precio
 * @property string|null $descripcion
 * @property int|null $id_adicional
 * 
 * @property Adicionale|null $adicionale
 * @property Collection|PedidoDetalle[] $pedido_detalles
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class Platillo extends Model
{
	protected $table = 'platillo';
	protected $primaryKey = 'id_platillo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_platillo' => 'int',
		'precio' => 'float',
		'id_adicional' => 'int'
	];

	protected $fillable = [
		'nombre_platillo',
		'precio',
		'descripcion',
		'id_adicional'
	];

	public function adicionale()
	{
		return $this->belongsTo(Adicionale::class, 'id_adicional');
	}

	public function pedido_detalles()
	{
		return $this->hasMany(PedidoDetalle::class, 'id_platillo');
	}

	public function productos()
	{
		return $this->belongsToMany(Producto::class, 'platillo_producto', 'id_platillo', 'id_producto')
					->withPivot('cantidad');
	}
}
