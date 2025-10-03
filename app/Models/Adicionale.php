<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Adicionale
 * 
 * @property int $id_adicional
 * @property string $nombre_adicional
 * @property float $precio
 * 
 * @property Collection|PedidoDetalle[] $pedido_detalles
 * @property Collection|Platillo[] $platillos
 *
 * @package App\Models
 */
class Adicionale extends Model
{
	protected $table = 'adicionales';
	protected $primaryKey = 'id_adicional';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_adicional' => 'int',
		'precio' => 'float'
	];

	protected $fillable = [
		'nombre_adicional',
		'precio'
	];

	public function pedido_detalles()
	{
		return $this->hasMany(PedidoDetalle::class, 'id_adicional');
	}

	public function platillos()
	{
		return $this->hasMany(Platillo::class, 'id_adicional');
	}
}
