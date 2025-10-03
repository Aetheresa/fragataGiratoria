<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Bebida
 * 
 * @property int $id_bebidas
 * @property string $nombre_bebida
 * @property string $tipo_de_bebida
 * @property float $precio
 * @property string|null $proveedor
 * 
 * @property Collection|PedidoDetalle[] $pedido_detalles
 *
 * @package App\Models
 */
class Bebida extends Model
{
	protected $table = 'bebidas';
	protected $primaryKey = 'id_bebidas';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_bebidas' => 'int',
		'precio' => 'float'
	];

	protected $fillable = [
		'nombre_bebida',
		'tipo_de_bebida',
		'precio',
		'proveedor'
	];

	public function pedido_detalles()
	{
		return $this->hasMany(PedidoDetalle::class, 'id_bebida');
	}
}
