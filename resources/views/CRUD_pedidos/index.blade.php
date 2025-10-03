@extends('layouts.sidebar')

@section('title', 'Pedidos')

@section('content')
<link rel="stylesheet" href="{{ asset('css/pedidos.css') }}">

<div class="dashboard-box">
    <h1 class="text-2xl font-bold mb-4">📦 Lista de Pedidos</h1>

    <!-- Botón crear -->
    <div class="actions-header mb-4">
        <a href="{{ route('pedidos.create') }}" class="btn-agregar">➕ Nuevo Pedido</a>
    </div>

    <!-- Tabla -->
    <table class="table-pedidos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id_pedido }}</td>
                    <td>{{ $pedido->cliente }}</td>
                    <td>{{ $pedido->fecha }}</td>
                    <td>{{ $pedido->estado }}</td>
                    <td>${{ number_format($pedido->total, 2) }}</td>
                    <td class="acciones">
                        <!-- Editar -->
                        <a href="{{ route('pedidos.edit', $pedido->id_pedido) }}" class="btn edit">✏️</a>

                        <!-- Eliminar -->
                        <form action="{{ route('pedidos.destroy', $pedido->id_pedido) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn delete" onclick="return confirm('¿Eliminar este pedido?')">🗑️</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="no-data">⚠️ No hay pedidos registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="mt-4 flex justify-center">
        {{ $pedidos->links() }}
    </div>
</div>
@endsection
