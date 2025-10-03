<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::paginate(10);
        return view('CRUD.index', compact('usuarios'));
    }

    public function create()
    {
        return view('CRUD.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario'        => 'required|string|max:100',
            'nombre_usuario' => 'required|string|max:150',
            'email'          => 'required|email|unique:usuario,email',
            'nombre_rol'     => 'required|string|max:50', // 👈 agregado
            'password'       => 'required|string|min:6',
        ]);

        Usuario::create([
            'usuario'        => $request->usuario,
            'nombre_usuario' => $request->nombre_usuario,
            'email'          => $request->email,
            'nombre_rol'     => $request->nombre_rol, // 👈 agregado
            'password'       => bcrypt($request->password),
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', '✅ Usuario creado correctamente.');
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('CRUD.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $request->validate([
            'usuario'        => 'required|string|max:100',
            'nombre_usuario' => 'required|string|max:150',
            'email'          => 'required|email|unique:usuario,email,' . $usuario->id_usuario . ',id_usuario',
            'nombre_rol'     => 'required|string|max:50', // 👈 agregado
        ]);

        $usuario->update([
            'usuario'        => $request->usuario,
            'nombre_usuario' => $request->nombre_usuario,
            'email'          => $request->email,
            'nombre_rol'     => $request->nombre_rol, // 👈 agregado
        ]);

        return redirect()->route('usuarios.index')
            ->with('success', '✏️ Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')
            ->with('success', '🗑️ Usuario eliminado correctamente.');
    }
}
