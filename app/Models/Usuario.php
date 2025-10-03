<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;

    protected $table = 'usuario';         
    protected $primaryKey = 'id_usuario'; 
    public $timestamps = false;           

    protected $fillable = [
        'usuario',
        'password',
        'email',
        'nombre_usuario',
        'fecha_creacion',
        'ultimo_acceso',
        'rol',
        'estado_usuario',
    ];

    // 👇 importante para que Laravel sepa qué campo es la contraseña
    protected $hidden = [
        'password',
    ];
}
