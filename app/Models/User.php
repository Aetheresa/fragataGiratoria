<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    // Nombre de la tabla real
    protected $table = 'usuario';

    // Clave primaria
    protected $primaryKey = 'id_usuario';
    public $incrementing = true;
    public $timestamps = false; // cámbialo a true si tu tabla tiene created_at / updated_at

    // Campos asignables
    protected $fillable = [
        'usuario',
        'nombre_usuario',
        'email',
        'password',
        'rol',
        'estado_usuario',
    ];

    // Campos ocultos
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
