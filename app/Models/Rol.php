<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol'; // 👈 cámbialo a 'roles' si tu tabla está en plural
    protected $primaryKey = 'id_rol';
    public $timestamps = false;

    protected $fillable = [
        'nombre_rol',
        'descripcion',
        'permisos'
    ];

    // Relación con usuarios
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_rol');
    }

    // Relación con jornada laboral
    public function jornada_laborals()
    {
        return $this->hasMany(JornadaLaboral::class, 'id_rol');
    }

    // Relación con logins de usuario
    public function usuario_logins()
    {
        return $this->hasMany(UsuarioLogin::class, 'id_rol');
    }
}
