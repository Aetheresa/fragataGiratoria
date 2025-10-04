<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    // Mostrar lista con paginación y filtro de búsqueda
    public function index(Request $request)
    {
        $query = Pedido::query();

        // Filtro de búsqueda por nombre de platillo o ID de mesa
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nombre_platillo', 'LIKE', "%{$search}%")
                  ->orWhere('id_mesa', 'LIKE', "%{$search}%");
        }

        $pedidos = $query->paginate(10)->appends($request->all());

        return view('CRUD_pedidos.index', compact('pedidos'));
    }

    // Mostrar formulario creación
    public function create()
    {
        return view('CRUD_pedidos.create');
    }

    // Guardar nuevo pedido
    public function store(Request $request)
    {
        $request->validate([
            'fecha_hora' => 'required|date',
            'tiempo_estimado' => 'nullable',
            'total_a_pagar' => 'required|numeric|min:0',
            'nombre_platillo' => 'nullable|string|max:255',
            'id_mesa' => 'required|integer',
            'id_estado_pedido' => 'required|integer',
        ]);

        Pedido::create($request->all());

        return redirect()->route('pedidos.index')->with('success', '✅ Pedido creado correctamente.');
    }

    // Mostrar formulario edición
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('CRUD_pedidos.edit', compact('pedido'));
    }

    // Actualizar pedido
    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha_hora' => 'required|date',
            'tiempo_estimado' => 'nullable',
            'total_a_pagar' => 'required|numeric|min:0',
            'nombre_platillo' => 'nullable|string|max:255',
            'id_mesa' => 'required|integer',
            'id_estado_pedido' => 'required|integer',
        ]);

        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());

        return redirect()->route('pedidos.index')->with('success', '✏️ Pedido actualizado correctamente.');
    }

    // Eliminar pedido
    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        return redirect()->route('pedidos.index')->with('success', '🗑️ Pedido eliminado correctamente.');
    }
}
