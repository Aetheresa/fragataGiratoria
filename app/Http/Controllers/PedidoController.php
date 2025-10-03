<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    // 📦 Listar pedidos con paginación
    public function index()
    {
        // ✅ Usamos paginate() en lugar de all()
        $pedidos = Pedido::paginate(10);
        return view('CRUD_pedidos.index', compact('pedidos'));
    }

    // ➕ Crear nuevo pedido
    public function create()
    {
        return view('CRUD_pedidos.create');
    }

    // 💾 Guardar pedido
    public function store(Request $request)
    {
        $request->validate([
            'cliente' => 'required|string|max:150',
            'fecha'   => 'required|date',
            'estado'  => 'required|string|max:50',
            'total'   => 'required|numeric|min:0',
        ]);

        Pedido::create($request->all());

        return redirect()->route('pedidos.index')
            ->with('success', '✅ Pedido creado correctamente.');
    }

    // ✏️ Editar pedido
    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('CRUD_pedidos.edit', compact('pedido'));
    }

    // 🔄 Actualizar pedido
    public function update(Request $request, $id)
    {
        $request->validate([
            'cliente' => 'required|string|max:150',
            'fecha'   => 'required|date',
            'estado'  => 'required|string|max:50',
            'total'   => 'required|numeric|min:0',
        ]);

        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());

        return redirect()->route('pedidos.index')
            ->with('success', '✏️ Pedido actualizado correctamente.');
    }

    // 🗑️ Eliminar pedido
    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        return redirect()->route('pedidos.index')
            ->with('success', '🗑️ Pedido eliminado correctamente.');
    }
}
