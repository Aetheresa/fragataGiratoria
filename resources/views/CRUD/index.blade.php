@extends('layouts.sidebar')

@section('title', '👥 Usuarios Registrados')

@section('content')

<!-- Vincular CSS de usuarios -->
<link rel="stylesheet" href="{{ asset('css/usuarios.css') }}">

<div class="dashboard-box">
    <h1>👥 Usuarios Registrados</h1>

    <!-- Formulario de búsqueda -->
    <form id="search-form" action="{{ route('usuarios.index') }}" method="GET" class="search-form">
        <input type="text" name="search" id="search-input" 
               value="{{ old('search', request()->get('search')) }}" 
               placeholder="Ingrese los nombres de Usarios registrados ..." class="search-input">
    </form>

    <div class="actions-header">
        <a href="{{ route('usuarios.create') }}" class="btn add">➕ Agregar Usuario</a>
    </div>

    <table class="table-usuarios">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($usuarios as $usuario)
                <tr class="{{ (request()->get('search') && 
                              (str_contains(strtolower($usuario->usuario), strtolower(request()->get('search'))) || 
                               str_contains(strtolower($usuario->nombre_usuario), strtolower(request()->get('search'))) ||
                               str_contains(strtolower($usuario->email), strtolower(request()->get('search'))) ) ? 'highlight' : '') }}">
                    <td>{{ $usuario->id_usuario }}</td>
                    <td>{{ $usuario->usuario }}</td>
                    <td>{{ $usuario->nombre_usuario }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->nombre_rol ?? 'Sin rol' }}</td>
                    <td class="acciones">
                        <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}" class="btn edit">✏️ Editar</a>
                        <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn delete">🗑️ Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="no-data">⚠️ No hay usuarios registrados</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginación -->
    {{ $usuarios->links() }}
</div>

@endsection
