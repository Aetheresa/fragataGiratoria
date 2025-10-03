<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NumeroReferencium
 * 
 * @property int $numero_referencia
 * @property int $id_pedido
 * 
 * @property Pedido $pedido
 *
 * @package App\Models
 */
class NumeroReferencium extends Model
{
	protected $table = 'numero_referencia';
	protected $primaryKey = 'numero_referencia';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'numero_referencia' => 'int',
		'id_pedido' => 'int'
	];

	protected $fillable = [
		'id_pedido'
	];

	public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'id_pedido');
	}
}
