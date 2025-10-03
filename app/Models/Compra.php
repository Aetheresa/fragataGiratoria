<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Compra
 * 
 * @property int $id_compra
 * @property int $id_proveedor
 * @property Carbon $fecha_compra
 * @property float $total_compra
 * 
 * @property Proveedor $proveedor
 * @property Collection|DetalleCompra[] $detalle_compras
 *
 * @package App\Models
 */
class Compra extends Model
{
	protected $table = 'compra';
	protected $primaryKey = 'id_compra';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_compra' => 'int',
		'id_proveedor' => 'int',
		'fecha_compra' => 'datetime',
		'total_compra' => 'float'
	];

	protected $fillable = [
		'id_proveedor',
		'fecha_compra',
		'total_compra'
	];

	public function proveedor()
	{
		return $this->belongsTo(Proveedor::class, 'id_proveedor');
	}

	public function detalle_compras()
	{
		return $this->hasMany(DetalleCompra::class, 'id_compra');
	}
}
