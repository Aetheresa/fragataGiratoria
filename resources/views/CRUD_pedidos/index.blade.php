@extends('layouts.sidebar')

@section('title', 'Pedidos')

@section('content')
<link rel="stylesheet" href="{{ asset('css/pedidos.css') }}">

<div class="dashboard-box">
    <h1 class="text-2xl font-bold mb-4">📦 Lista de Pedidos</h1>

    <!-- 🔍 Buscador -->
    <div class="search-container mb-4">
        <input class="search-input" type="search" id="search-pedido" placeholder="🔍 Buscar Pedido" />
    </div>

    <!-- Botón crear -->
    <div class="actions-header mb-4">
        <a href="{{ route('pedidos.create') }}" class="btn-agregar">➕ Nuevo Pedido</a>
    </div>

    <!-- Tabla de pedidos -->
    <table class="table-pedidos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha y Hora</th>
                <th>Tiempo Estimado</th>
                <th>Total a Pagar</th>
                <th>Nombre Platillo</th>
                <th>ID Mesa</th>
                <th>ID Estado Pedido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pedidos as $pedido)
                <tr class="pedido-row hover:bg-gray-50">
                    <td>{{ $pedido->id_pedido }}</td>
                    <td>{{ $pedido->fecha_hora }}</td>
                    <td>{{ $pedido->tiempo_estimado ?? 'N/A' }}</td>
                    <td>${{ number_format($pedido->total_a_pagar, 2) }}</td>
                    <td>{{ $pedido->nombre_platillo ?? '—' }}</td>
                    <td>{{ $pedido->id_mesa }}</td>
                    <td>{{ $pedido->id_estado_pedido }}</td>

                    <td class="acciones">
                        <!-- Editar -->
                        <a href="{{ route('pedidos.edit', $pedido->id_pedido) }}" class="btn edit">✏️ Editar</a>
                        <!-- Eliminar -->
                        <form action="{{ route('pedidos.destroy', $pedido->id_pedido) }}" 
                              method="POST" 
                              onsubmit="return confirm('¿Seguro que deseas eliminar este pedido?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn delete">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="no-data">⚠️ No hay pedidos registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="mt-4 flex justify-center">
        {{ $pedidos->links() }}
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("search-pedido");
    const tableRows = document.querySelectorAll(".pedido-row");  // Clase de cada fila de la tabla

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
