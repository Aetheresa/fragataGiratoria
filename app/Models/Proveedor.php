<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedor
 * 
 * @property int $id_proveedor
 * @property string $nombre_proveedor
 * @property string|null $contacto
 * 
 * @property Collection|Compra[] $compras
 *
 * @package App\Models
 */
class Proveedor extends Model
{
	protected $table = 'proveedor';
	protected $primaryKey = 'id_proveedor';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_proveedor' => 'int'
	];

	protected $fillable = [
		'nombre_proveedor',
		'contacto'
	];

	public function compras()
	{
		return $this->hasMany(Compra::class, 'id_proveedor');
	}
}
