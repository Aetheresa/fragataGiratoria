@extends('layouts.sidebar')

@section('title', '📦 Productos')

@section('content')
<link rel="stylesheet" href="{{ asset('css/productos.css') }}">

<div class="dashboard-box">
    <h1>📦 Lista de Productos</h1>

    <!-- 🔍 Buscador -->
    <div class="search-container mb-4">
        <input class="search-input" type="search" id="search-producto" placeholder="🔍 Buscar Producto" />
    </div>

    <div class="actions-header">
        <a href="{{ route('productos.create') }}" class="btn-agregar">➕ Agregar Producto</a>
        <a href="{{ route('productos.pdf') }}" class="btn-agregar" style="background:#3b82f6;"> 📄 Exportar PDF</a>
    </div>

    <table class="table-productos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Unidad</th>
                <th>Cantidad Disponible</th>
                <th>Stock Inicial</th>
                <th>Stock Final</th>
                <th>Stock Mínimo</th>
                <th>Proveedor</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productos as $producto)
                <tr class="producto-row">
                    <td>{{ $producto->id_producto }}</td>
                    <td>{{ $producto->nombre_producto }}</td>
                    <td>{{ $producto->tipo_producto }}</td>
                    <td>{{ $producto->unidad_medida }}</td>
                    <td>{{ $producto->cantidad_disponible }}</td>
                    <td>{{ $producto->stock_inicial }}</td>
                    <td>{{ $producto->stock_final }}</td>
                    <td>{{ $producto->stock_minimo }}</td>
                    <td>{{ $producto->proveedor }}</td>
                    <td class="acciones">
                        <a href="{{ route('productos.edit', $producto->id_producto) }}" class="btn edit">✏️ Editar</a>
                        <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" style="display:inline" onsubmit="return confirm('¿Seguro de borrar este producto?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn delete">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="10" class="no-data">⚠️ No hay productos registrados</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="paginacion p-4">
        {{ $productos->links() }}
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("search-producto");
    const tableRows = document.querySelectorAll(".producto-row");  // Clase de cada fila de la tabla

    searchInput.addEventListener("input", function() {
        const searchTerm = searchInput.value.toLowerCase();

        tableRows.forEach(row => {
            const cells = row.getElementsByTagName("td");
            let matchFound = false;

            // Iterar sobre todas las celdas de la fila y buscar coincidencias
            for (let cell of cells) {
                if (cell.textContent.toLowerCase().includes(searchTerm)) {
                    matchFound = true;
                    break;
                }
            }

            // Resaltar las filas que coinciden con el término de búsqueda en verde
            if (matchFound) {
                row.style.backgroundColor = "rgba(34, 197, 94, 0.3)";  // Verde claro
            } else {
                row.style.backgroundColor = "";  // Eliminar el resaltado si no hay coincidencia
            }
        });
    });
});
</script>

@endsection
