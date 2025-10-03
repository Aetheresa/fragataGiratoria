@extends('layouts.sidebar')

@section('title', 'Editar Usuario')

@section('content')
    <!-- Conexión al CSS -->
    <link rel="stylesheet" href="{{ asset('css/editusuarios.css') }}">

    <div class="dashboard-box">
        <h2 class="form-title">✏️ Editar Usuario</h2>

        <!-- ✅ Notificación de éxito -->
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- ⚠️ Validación de errores -->
        @if ($errors->any())
            <div class="alert-error">
                <strong>⚠️ Oops!</strong> Corrige los siguientes errores:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('usuarios.update', $usuario->id_usuario) }}" method="POST" class="form-usuarios">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Usuario</label>
                <input type="text" name="usuario" value="{{ old('usuario', $usuario->usuario) }}" class="input-field" required>
            </div>

            <div class="form-group">
                <label>Nombre completo</label>
                <input type="text" name="nombre_usuario" value="{{ old('nombre_usuario', $usuario->nombre_usuario) }}" class="input-field" required>
            </div>

            <div class="form-group">
                <label>Correo electrónico</label>
                <input type="email" name="email" value="{{ old('email', $usuario->email) }}" class="input-field" required>
            </div>

            <div class="form-group">
                <label>Rol</label>
                <input type="text" name="nombre_rol" value="{{ old('nombre_rol', $usuario->nombre_rol) }}" class="input-field">
            </div>

            <div class="form-actions">
                <a href="{{ route('usuarios.index') }}" class="btn-cancelar">⬅️ Volver</a>
                <button type="submit" class="btn-guardar">💾 Actualizar</button>
            </div>
        </form>
    </div>
@endsection
