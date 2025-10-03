<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $table = 'pedido'; // 👈 asegúrate que tu tabla se llame así
    protected $primaryKey = 'id_pedido';
    public $timestamps = false; // si no usas created_at / updated_at

    protected $fillable = [
        'cliente',
        'fecha',
        'estado',
        'total'
    ];
}
