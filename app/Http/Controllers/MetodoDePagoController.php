<?php

namespace App\Http\Controllers;

use App\Models\MetodoDePago;
use Illuminate\Http\Request;

class MetodoDePagoController extends Controller
{
    /**
     * Mostrar lista de métodos de pago con opción de búsqueda
     */
    public function index(Request $request)
    {
        // Obtener el término de búsqueda desde la URL
        $search = $request->get('search');

        // Realizar la consulta con el término de búsqueda
        $metodos = MetodoDePago::query()
            ->when($search, function ($query) use ($search) {
                // Filtrar en los campos nombre_metodo, id_usuario, id_pedido, etc.
                $query->where('nombre_metodo', 'like', "%{$search}%")
                    ->orWhere('id_usuario', 'like', "%{$search}%")
                    ->orWhere('id_pedido', 'like', "%{$search}%");
            })
            // Paginar los resultados
            ->paginate(10);

        // Retornar la vista con los resultados de métodos de pago y el término de búsqueda
        return view('CRUD_MetodosPago.index', compact('metodos', 'search'));
    }

    /**
     * Formulario de creación
     */
    public function create()
    {
        return view('CRUD_MetodosPago.create');
    }

    /**
     * Guardar nuevo método de pago
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_metodo' => 'required|string|max:50',
            'id_usuario'    => 'required|integer',
            'id_pedido'     => 'required|integer',
        ]);

        MetodoDePago::create($request->all());

        return redirect()->route('metodosdepago.index')
            ->with('success', '✅ Método de pago agregado correctamente');
    }

    /**
     * Formulario de edición
     */
    public function edit(MetodoDePago $metodosdepago)
    {
        return view('CRUD_MetodosPago.edit', compact('metodosdepago'));
    }

    /**
     * Actualizar método de pago
     */
    public function update(Request $request, MetodoDePago $metodosdepago)
    {
        $request->validate([
            'nombre_metodo' => 'required|string|max:50',
            'id_usuario'    => 'required|integer',
            'id_pedido'     => 'required|integer',
        ]);

        $metodosdepago->update($request->all());

        return redirect()->route('metodosdepago.index')
            ->with('success', '✏️ Método de pago actualizado correctamente');
    }

    /**
     * Eliminar método de pago
     */
    public function destroy(MetodoDePago $metodosdepago)
    {
        $metodosdepago->delete();

        return redirect()->route('metodosdepago.index')
            ->with('success', '🗑️ Método de pago eliminado correctamente');
    }
}
