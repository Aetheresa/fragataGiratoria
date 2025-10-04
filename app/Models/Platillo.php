<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platillo extends Model
{
    use HasFactory;

    protected $table = 'platillo';
    protected $primaryKey = 'id_platillo';
    public $timestamps = false;

    protected $fillable = [
        'nombre_platillo',
        'descripcion',
        'precio',
        'id_adicional',
    ];
}
