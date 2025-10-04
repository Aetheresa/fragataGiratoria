@extends('layouts.sidebar')

@section('title', 'Crear Producto')

@section('content')
<link rel="stylesheet" href="{{ asset('css/crearproducto.css') }}">

<div class="dashboard-box">
    <h2 class="form-title">➕ Nuevo Producto</h2>

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

    <form action="{{ route('productos.store') }}" method="POST" class="form-producto">
        @csrf

        <div class="form-group">
            <label>Nombre del Producto</label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" class="input-field" required>
        </div>

        <div class="form-group">
            <label>Descripción</label>
            <textarea name="descripcion" class="input-field" required>{{ old('descripcion') }}</textarea>
        </div>

        <div class="form-group">
            <label>Precio</label>
            <input type="number" step="0.01" name="precio" value="{{ old('precio') }}" class="input-field" required>
        </div>

        <div class="form-group">
            <label>Categoría</label>
            <input type="text" name="categoria" value="{{ old('categoria') }}" class="input-field" required>
        </div>

        <div class="form-actions">
            <a href="{{ route('productos.index') }}" class="btn-cancelar">⬅️ Volver</a>
            <button type="submit" class="btn-guardar">💾 Guardar</button>
        </div>
    </form>
</div>
@endsection
