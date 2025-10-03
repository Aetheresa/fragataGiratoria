<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductoController extends Controller
{
    public function __construct()
    {
        // 🔒 Todas requieren login, excepto exportarPDF
        $this->middleware('auth')->except(['exportarPDF']);
    }

    // 📦 Listar productos con paginación
    public function index()
    {
        $productos = Producto::paginate(10);
        return view('CRUD_Productos.index', compact('productos'));
    }

    // ➕ Formulario de creación
    public function create()
    {
        return view('CRUD_Productos.create');
    }

    // 💾 Guardar nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto'     => 'required|string|max:255',
            'tipo_producto'       => 'required|string|max:255',
            'unidad_medida'       => 'nullable|string|max:100',
            'cantidad_disponible' => 'required|numeric|min:0',
            'stock_inicial'       => 'required|numeric|min:0',
            'stock_final'         => 'required|numeric|min:0',
            'stock_minimo'        => 'required|numeric|min:0',
            'proveedor'           => 'nullable|string|max:255',
        ]);

        Producto::create($request->all());

        return redirect()
            ->route('productos.index')
            ->with('success', '✅ Producto creado correctamente');
    }

    // 👁️ Ver detalle de un producto
    public function show($id)
    {
        $producto = Producto::findOrFail($id);
        return view('CRUD_Productos.show', compact('producto'));
    }

    // ✏️ Formulario de edición
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        return view('CRUD_Productos.edit', compact('producto'));
    }

    // 🔄 Actualizar producto
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_producto'     => 'required|string|max:255',
            'tipo_producto'       => 'required|string|max:255',
            'unidad_medida'       => 'nullable|string|max:100',
            'cantidad_disponible' => 'required|numeric|min:0',
            'stock_inicial'       => 'required|numeric|min:0',
            'stock_final'         => 'required|numeric|min:0',
            'stock_minimo'        => 'required|numeric|min:0',
            'proveedor'           => 'nullable|string|max:255',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($request->all());

        return redirect()
            ->route('productos.index')
            ->with('success', '✏️ Producto actualizado correctamente');
    }

    // 🗑️ Eliminar producto
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()
            ->route('productos.index')
            ->with('success', '🗑️ Producto eliminado correctamente');
    }

    // 📄 Exportar a PDF
    public function exportarPDF()
    {
        $productos = Producto::all();

        $pdf = Pdf::loadView('CRUD_Productos.pdf', compact('productos'))
                  ->setPaper('a4', 'landscape');

        // 🔽 Descargar automáticamente
        return $pdf->download('reporte_productos.pdf');

        // 👉 Si prefieres verlo en navegador:
        // return $pdf->stream('reporte_productos.pdf');
    }
}
