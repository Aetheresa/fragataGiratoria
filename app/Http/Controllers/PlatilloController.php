<?php

namespace App\Http\Controllers;

use App\Models\Platillo;
use Illuminate\Http\Request;

class PlatilloController extends Controller
{
    public function index()
    {
        $platillos = Platillo::paginate(10);
        return view('CRUD_Platillos.index', compact('platillos'));
    }

    public function create()
    {
        return view('CRUD_Platillos.create');
    }

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

    public function edit($id)
    {
        $platillo = Platillo::findOrFail($id);
        return view('CRUD_Platillos.edit', compact('platillo'));
    }

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

    public function destroy($id)
    {
        $platillo = Platillo::findOrFail($id);
        $platillo->delete();

        return redirect()->route('platillos.index')
            ->with('success', '🗑️ Platillo eliminado correctamente.');
    }
}
