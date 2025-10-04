@extends('layouts.sidebar')

@section('title', 'Crear Usuario')

@section('content')
    <!-- Conexión al CSS -->
    <link rel="stylesheet" href="{{ asset('css/createusuario.css') }}">

    <div class="dashboard-box">
        <h2 class="form-title">➕ Crear Usuario</h2>

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

        <form action="{{ route('usuarios.store') }}" method="POST" class="form-usuarios">
            @csrf
            <div class="form-group">
                <label>Usuario</label>
                <input type="text" name="usuario" value="{{ old('usuario') }}" class="input-field" required>
            </div>

            <div class="form-group">
                <label>Nombre completo</label>
                <input type="text" name="nombre_usuario" value="{{ old('nombre_usuario') }}" class="input-field" required>
            </div>

            <div class="form-group">
                <label>Correo electrónico</label>
                <input type="email" name="email" value="{{ old('email') }}" class="input-field" required>
            </div>

            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" class="input-field" required>
            </div>

            <div class="form-group">
                <label>Rol</label>
                <input type="text" name="nombre_rol" value="{{ old('nombre_rol') }}" class="input-field">
            </div>

            <div class="form-actions">
                <a href="{{ route('usuarios.index') }}" class="btn-cancelar">⬅️ Volver</a>
                <button type="submit" class="btn-guardar">✅ Guardar</button>
            </div>
        </form>
    </div>
@endsection
