<?php

namespace App\Http\Controllers;

use App\Models\Platillo;
use Illuminate\Http\Request;

class PlatilloController extends Controller
{
    /**
     * 📌 Muestra la lista de platillos.
     */
    public function index()
    {
        $platillos = Platillo::paginate(10); // paginación
        return view('CRUD_Platillos.index', compact('platillos'));
    }

    /**
     * 📌 Formulario de creación.
     */
    public function create()
    {
        return view('CRUD_Platillos.create');
    }

    /**
     * 📌 Guardar nuevo platillo.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_platillo' => 'required|string|max:100',
            'descripcion'     => 'nullable|string',
            'precio'          => 'required|numeric|min:0',
            'id_adicional'    => 'nullable|integer',
        ]);

        Platillo::create($request->all());

        return redirect()->route('platillos.index')
            ->with('success', '✅ Platillo creado correctamente.');
    }

    /**
     * 📌 Formulario de edición.
     */
    public function edit($id)
    {
        $platillo = Platillo::findOrFail($id);
        return view('CRUD_Platillos.edit', compact('platillo'));
    }

    /**
     * 📌 Actualizar platillo.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_platillo' => 'required|string|max:100',
            'descripcion'     => 'nullable|string',
            'precio'          => 'required|numeric|min:0',
            'id_adicional'    => 'nullable|integer',
        ]);

        $platillo = Platillo::findOrFail($id);
        $platillo->update($request->all());

        return redirect()->route('platillos.index')
            ->with('success', '✏️ Platillo actualizado correctamente.');
    }

    /**
     * 📌 Eliminar platillo.
     */
    public function destroy($id)
    {
        $platillo = Platillo::findOrFail($id);
        $platillo->delete();

        return redirect()->route('platillos.index')
            ->with('success', '🗑️ Platillo eliminado correctamente.');
    }
}
