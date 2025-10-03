<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedido'; // 👈 fuerza a usar la tabla singular
    protected $primaryKey = 'id_pedido';
    public $timestamps = false;

    protected $fillable = [
        'fecha_hora',
        'tiempo_estimado',
        'total_a_pagar',
        'nombre_platillo',
        'id_mesa',
        'id_estado_pedido'
    ];
}
