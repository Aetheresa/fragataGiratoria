<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;


class UsuarioController extends Controller
{
    public function index()
    {
        // ✅ Traemos todos los usuarios
        $usuarios = Usuario::all();
        return view('CRUD.index', compact('usuarios'));
    }

    public function create()
    {
        // ✅ Mostramos formulario de creación
        return view('CRUD.create');
    }

    public function store(Request $request)
    {
        // ✅ Validamos los campos
        $request->validate([
            'usuario'        => 'required|string|max:100',
            'nombre_usuario' => 'required|string|max:150',
            'email'          => 'required|email|unique:usuario,email',
            'password'       => 'required|min:6',
            'rol'            => 'required|string|max:50', // 🔹 ahora obligatorio
        ]);

        // ✅ Creamos el usuario
        Usuario::create([
            'usuario'        => $request->usuario,
            'nombre_usuario' => $request->nombre_usuario,
            'email'          => $request->email,
            'password'       => Hash::make($request->password),
            'rol'            => $request->rol, // se guarda como texto
            'fecha_creacion' => now(),
            'estado_usuario' => 'activo',
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', '✅ Usuario creado correctamente.');
    }

    public function edit($id)
    {
        // ✅ Buscamos usuario a editar
        $usuario = Usuario::findOrFail($id);
        return view('CRUD.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        // ✅ Validamos al actualizar
        $request->validate([
            'usuario'        => 'required|string|max:100',
            'nombre_usuario' => 'required|string|max:150',
            'email'          => 'required|email|unique:usuario,email,' . $usuario->id_usuario . ',id_usuario',
            'rol'            => 'required|string|max:50',
        ]);

        // ✅ Actualizamos
        $usuario->update([
            'usuario'        => $request->usuario,
            'nombre_usuario' => $request->nombre_usuario,
            'email'          => $request->email,
            'rol'            => $request->rol,
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', '✏️ Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        // ✅ Eliminamos usuario
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')
            ->with('success', '🗑️ Usuario eliminado correctamente.');
    }
}
