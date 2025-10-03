<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // ✅ para usar Auth
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = [
        'usuario',
        'nombre_usuario',
        'email',
        'password',
        'id_rol',
        'fecha_creacion',
        'estado_usuario'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * 🔹 Relación con UsuarioLogin
     */
    public function logins()
    {
        return $this->hasMany(UsuarioLogin::class, 'id_usuario');
    }

    /**
     * 🔹 Relación con Rol
     */
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol');
    }
}
