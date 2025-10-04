@extends('layouts.sidebar')

@section('title', 'Métodos de Pago')

@section('content')
<link rel="stylesheet" href="{{ asset('css/metodo.css') }}">

<div class="dashboard-box">
    <h1>💳 Métodos de Pago</h1>

    <!-- 🔍 Buscador -->
    <div class="search-container">
        <input class="search-input" type="search" id="search-metodo" placeholder="🔍 Buscar Método de Pago" />
    </div>

    <div class="actions-header">
        <a href="{{ route('metodosdepago.create') }}" class="btn-agregar">➕ Nuevo Método</a>
    </div>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <table class="table-metodos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Método</th>
                <th>Usuario</th>
                <th>Pedido</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($metodos as $metodo)
                <tr class="metodo-row">
                    <td>{{ $metodo->id_metodo_pago }}</td>
                    <td>{{ $metodo->nombre_metodo }}</td>
                    <td>{{ $metodo->id_usuario }}</td>
                    <td>{{ $metodo->id_pedido }}</td>
                    <td class="acciones">
                        <a href="{{ route('metodosdepago.edit', $metodo->id_metodo_pago) }}" class="btn edit">✏️ Editar</a>
                        <form action="{{ route('metodosdepago.destroy', $metodo->id_metodo_pago) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn delete" onclick="return confirm('¿Eliminar este método?')">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="no-data">⚠️ No hay métodos de pago registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="pagination">
        {{ $metodos->links() }}
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("search-metodo");
    const tableRows = document.querySelectorAll(".metodo-row");  // Clase de cada fila de la tabla

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
