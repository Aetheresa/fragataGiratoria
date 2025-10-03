<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    // Nombre de la tabla en la BD
    protected $table = 'compra'; // 👈 asegúrate que tu tabla se llama "compra"

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'id', 
        'producto_id', 
        'cantidad', 
        'precio',
        'created_at',
        'updated_at'
    ];
}
