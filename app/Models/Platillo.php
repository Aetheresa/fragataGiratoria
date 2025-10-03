<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platillo extends Model
{
    protected $table = 'platillo';   // nombre real de la tabla
    protected $primaryKey = 'id_platillo'; // clave primaria

    public $timestamps = false; // 🚀 Desactiva created_at y updated_at

    protected $fillable = [
        'nombre_platillo',
        'descripcion',
        'precio',
        'id_adicional'
    ];
}
