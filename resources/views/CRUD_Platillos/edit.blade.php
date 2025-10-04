@extends('layouts.sidebar')

@section('title', 'Editar Platillo')

@section('content')
<link rel="stylesheet" href="{{ asset('css/editplatillo.css') }}">

<div class="dashboard-box">
    <h2 class="form-title">✏️ Editar Platillo</h2>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert-error">
            <strong>⚠️ Corrige los siguientes errores:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('platillos.update', $platillo->id_platillo) }}" method="POST" class="form-platillo">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nombre del Platillo</label>
            <input type="text" name="nombre_platillo"
                   value="{{ old('nombre_platillo', $platillo->nombre_platillo) }}"
                   class="input-field" required>
        </div>

        <div class="form-group">
            <label>Descripción</label>
            <textarea name="descripcion" class="input-field" required>{{ old('descripcion', $platillo->descripcion) }}</textarea>
        </div>

        <div class="form-group">
            <label>Precio</label>
            <input type="number" step="0.01" name="precio"
                   value="{{ old('precio', $platillo->precio) }}"
                   class="input-field" required>
        </div>

        <div class="form-group">
            <label>Adicional</label>
            <input type="text" name="id_adicional"
                   value="{{ old('id_adicional', $platillo->id_adicional) }}"
                   class="input-field">
        </div>

        <div class="form-actions">
            <a href="{{ route('platillos.index') }}" class="btn-cancelar">⬅️ Volver</a>
            <button type="submit" class="btn-guardar">💾 Guardar cambios</button>
        </div>
    </form>
</div>
@endsection
