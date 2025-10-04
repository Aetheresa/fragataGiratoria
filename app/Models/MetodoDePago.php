<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoDePago extends Model
{
    use HasFactory;

    protected $table = 'metodo_de_pago';
    protected $primaryKey = 'id_metodo_pago';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = [
        'nombre_metodo',
        'id_usuario',
        'id_pedido',
    ];
}
