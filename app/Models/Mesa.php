<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Mesa
 * 
 * @property int $id_mesa
 * @property int $numero_mesa
 * @property string|null $ubicacion
 * @property int $capacidad
 * 
 * @property Collection|Pedido[] $pedidos
 *
 * @package App\Models
 */
class Mesa extends Model
{
	protected $table = 'mesa';
	protected $primaryKey = 'id_mesa';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_mesa' => 'int',
		'numero_mesa' => 'int',
		'capacidad' => 'int'
	];

	protected $fillable = [
		'numero_mesa',
		'ubicacion',
		'capacidad'
	];

	public function pedidos()
	{
		return $this->hasMany(Pedido::class, 'id_mesa');
	}
}
