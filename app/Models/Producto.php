<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
    protected $primaryKey = 'id_producto';
    public $timestamps = false; // tu tabla no tiene created_at ni updated_at

    protected $fillable = [
        'nombre_producto',
        'tipo_producto',
        'unidad_medida',
        'cantidad_disponible',
        'stock_inicial',
        'stock_final',
        'stock_minimo',
        'proveedor',
        'ultima_actualizacion'
    ];
}
