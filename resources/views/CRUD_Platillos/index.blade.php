@extends('layouts.sidebar')

@section('title', 'Platillos')

@section('content')

<!-- Vincular el CSS específico -->
<link rel="stylesheet" href="{{ asset('css/platillos.css') }}">

<div class="dashboard-box">
    <!-- Mensaje de notificación -->
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-2xl font-bold mb-4">🍽️ Lista de Platillos</h1>

    <!-- Botón para crear -->
    <div class="actions-header mb-4">
        <a href="{{ route('platillos.create') }}" 
           class="btn-agregar">
            ➕ Agregar Platillo
        </a>
    </div>

    <!-- Tabla -->
    <table class="table-platillos">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Adicional</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($platillos as $platillo)
                <tr>
                    <td>{{ $platillo->id_platillo }}</td>
                    <td>{{ $platillo->nombre_platillo }}</td>
                    <td>{{ $platillo->descripcion }}</td>
                    <td>${{ number_format($platillo->precio, 2) }}</td>
                    <td>{{ $platillo->id_adicional ?? 'N/A' }}</td>
                    <td class="acciones">
                        <!-- Editar -->
                        <a href="{{ route('platillos.edit', $platillo->id_platillo) }}" 
                           class="btn edit">✏️ Editar</a>

                        <!-- Eliminar -->
                        <form action="{{ route('platillos.destroy', $platillo->id_platillo) }}" 
                              method="POST" 
                              onsubmit="return confirm('¿Seguro que deseas eliminar este platillo?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn delete">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="no-data">
                        ⚠️ No hay platillos registrados
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $platillos->links() }}
    </div>
</div>
@endsection
