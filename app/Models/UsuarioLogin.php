<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Muestra una lista de los usuarios con opción de búsqueda.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Obtener el término de búsqueda desde la URL
        $search = $request->get('search');

        // Realizar la consulta con el término de búsqueda
        $usuarios = Usuario::query()
            ->when($search, function ($query) use ($search) {
                // Filtrar en los campos usuario, nombre_usuario, email, mesero, etc.
                $query->where('usuario', 'like', "%{$search}%")
                      ->orWhere('nombre_usuario', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->orWhere('mesero', 'like', "%{$search}%");  // Aquí agregas cualquier campo adicional
            })
            // Paginar los resultados con 10 usuarios por página
            ->paginate(10);

        // Retornar la vista con los resultados de usuarios y el término de búsqueda
        return view('CRUD.index', compact('usuarios', 'search'));
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('CRUD.create');
    }

    /**
     * Almacena un nuevo usuario en la base de datos.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validación de los campos
        $request->validate([
            'usuario'        => 'required|string|max:100',
            'nombre_usuario' => 'required|string|max:150',
            'email'          => 'required|email|unique:usuarios,email',  // Ajuste aquí
            'nombre_rol'     => 'required|string|max:50',
            'password'       => 'required|string|min:6',
        ]);

        // Crear el usuario
        Usuario::create([
            'usuario'        => $request->usuario,
            'nombre_usuario' => $request->nombre_usuario,
            'email'          => $request->email,
            'nombre_rol'     => $request->nombre_rol,
            'password'       => bcrypt($request->password),
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('usuarios.index')
            ->with('success', '✅ Usuario creado correctamente.');
    }

    /**
     * Muestra el formulario para editar un usuario existente.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Buscar el usuario por su ID
        $usuario = Usuario::findOrFail($id);
        
        // Mostrar el formulario de edición
        return view('CRUD.edit', compact('usuario'));
    }

    /**
     * Actualiza la información de un usuario en la base de datos.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Buscar el usuario por su ID
        $usuario = Usuario::findOrFail($id);

        // Validación de los campos
        $request->validate([
            'usuario'        => 'required|string|max:100',
            'nombre_usuario' => 'required|string|max:150',
            'email'          => 'required|email|unique:usuarios,email,' . $usuario->id_usuario . ',id_usuario',  // Ajuste aquí
            'nombre_rol'     => 'required|string|max:50',
        ]);

        // Actualizar el usuario
        $usuario->update([
            'usuario'        => $request->usuario,
            'nombre_usuario' => $request->nombre_usuario,
            'email'          => $request->email,
            'nombre_rol'     => $request->nombre_rol,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('usuarios.index')
            ->with('success', '✏️ Usuario actualizado correctamente.');
    }

    /**
     * Elimina un usuario de la base de datos.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Buscar el usuario por su ID
        $usuario = Usuario::findOrFail($id);
        
        // Eliminar el usuario
        $usuario->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('usuarios.index')
            ->with('success', '🗑️ Usuario eliminado correctamente.');
    }
}
