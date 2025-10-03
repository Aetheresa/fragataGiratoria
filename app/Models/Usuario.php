<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'usuario';   // 👈 muy importante si tu tabla no es plural

    protected $primaryKey = 'id_usuario'; // 👈 porque tu PK no es "id"

    public $timestamps = false; // 👈 si tu tabla no tiene created_at / updated_at

    protected $fillable = [
        'usuario',
        'nombre_usuario',
        'email',
        'password',
        'nombre_rol', // 👈 AGREGA ESTO
    ];
}
