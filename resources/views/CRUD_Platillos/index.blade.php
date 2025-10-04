@extends('layouts.sidebar')

@section('title', 'Lista de Platillos')

@section('content')
<link rel="stylesheet" href="{{ asset('css/platillo.css') }}"> 

<div class="dashboard-box">
    <h1 class="text-2xl font-bold mb-4">🍽️ Lista de Platillos</h1>

    <!-- 🔍 Buscador -->
    <div class="search-container mb-4">
        <input class="search-input" type="search" id="search-platillo" placeholder="🔍 Buscar El Platillo" />
    </div>

    <div class="actions-header mb-4">
        <a href="{{ route('platillos.create') }}" class="btn-agregar">➕ Agregar Platillo</a>
    </div>

    <table class="table-pedidos w-full border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Nombre</th>
                <th class="border px-4 py-2">Descripción</th>
                <th class="border px-4 py-2">Precio</th>
                <th class="border px-4 py-2">Adicional</th>
                <th class="border px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($platillos as $platillo)
                <tr class="platillo-row hover:bg-gray-50">
                    <td class="border px-4 py-2">{{ $platillo->id_platillo }}</td>
                    <td class="border px-4 py-2">{{ $platillo->nombre_platillo }}</td>
                    <td class="border px-4 py-2">{{ $platillo->descripcion }}</td>
                    <td class="border px-4 py-2">${{ number_format($platillo->precio, 2) }}</td>
                    <td class="border px-4 py-2">{{ $platillo->id_adicional }}</td>
                    <td class="border px-4 py-2 flex gap-2">
                        <a href="{{ route('platillos.edit', $platillo->id_platillo) }}" class="btn edit">✏️ Editar</a>
                        <form action="{{ route('platillos.destroy', $platillo->id_platillo) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn delete" onclick="return confirm('¿Eliminar este platillo?')">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="no-data">⚠️ No hay platillos registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $platillos->links() }}
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("search-platillo");
    const tableRows = document.querySelectorAll(".platillo-row");  // Clase de cada fila de la tabla

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
