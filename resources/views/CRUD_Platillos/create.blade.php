@extends('layouts.sidebar')

@section('title', 'Nuevo Platillo')

@section('content')
<link rel="stylesheet" href="{{ asset('css/createplatillos.css') }}">

<div class="dashboard-box">
    <h2 class="form-title">🍽️ Nuevo Platillo</h2>

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

    <!-- 🧾 Formulario -->
    <form action="{{ route('platillos.store') }}" method="POST" class="form-platillo">
        @csrf

        <div class="form-group">
            <label>Nombre del Platillo</label>
            <input type="text" name="nombre_platillo" class="input-field" required>
        </div>

        <div class="form-group">
            <label>Descripción</label>
            <textarea name="descripcion" class="input-field" required></textarea>
        </div>

        <div class="form-group">
            <label>Precio</label>
            <input type="number" step="0.01" name="precio" class="input-field" required>
        </div>

        <div class="form-group">
            <label>ID Adicional</label>
            <input type="text" name="id_adicional" class="input-field">
        </div>

        <!-- Botones -->
        <div class="form-actions">
            <a href="{{ route('platillos.index') }}" class="btn-cancelar">⬅️ Volver</a>
            <button type="submit" class="btn-guardar">💾 Guardar</button>
        </div>
    </form>
</div>
@endsection
