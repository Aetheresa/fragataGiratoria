<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedido';
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
