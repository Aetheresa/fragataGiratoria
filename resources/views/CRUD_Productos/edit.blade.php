@extends('layouts.sidebar')

@section('title', 'Editar Producto')

@section('content')
<link rel="stylesheet" href="{{ asset('css/productoedit.css') }}">

<div class="dashboard-box">
    <h2 class="form-title">✏️ Editar Producto</h2>

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

    <form action="{{ route('productos.update', $producto->id_producto) }}" method="POST" class="form-producto">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Nombre del Producto</label>
            <input type="text" name="nombre_producto" 
                   value="{{ old('nombre_producto', $producto->nombre_producto) }}" 
                   class="input-field" required>
        </div>

        <div class="form-group">
            <label>Tipo de Producto</label>
            <input type="text" name="tipo_producto" 
                   value="{{ old('tipo_producto', $producto->tipo_producto) }}" 
                   class="input-field" required>
        </div>

        <div class="form-group">
            <label>Unidad de Medida</label>
            <input type="text" name="unidad_medida" 
                   value="{{ old('unidad_medida', $producto->unidad_medida) }}" 
                   class="input-field">
        </div>

        <div class="form-group">
            <label>Cantidad Disponible</label>
            <input type="number" name="cantidad_disponible" 
                   value="{{ old('cantidad_disponible', $producto->cantidad_disponible) }}" 
                   class="input-field" required>
        </div>

        <div class="form-group">
            <label>Stock Inicial</label>
            <input type="number" name="stock_inicial" 
                   value="{{ old('stock_inicial', $producto->stock_inicial) }}" 
                   class="input-field" required>
        </div>

        <div class="form-group">
            <label>Stock Final</label>
            <input type="number" name="stock_final" 
                   value="{{ old('stock_final', $producto->stock_final) }}" 
                   class="input-field" required>
        </div>

        <div class="form-group">
            <label>Stock Mínimo</label>
            <input type="number" name="stock_minimo" 
                   value="{{ old('stock_minimo', $producto->stock_minimo) }}" 
                   class="input-field" required>
        </div>

        <div class="form-group">
            <label>Proveedor</label>
            <input type="text" name="proveedor" 
                   value="{{ old('proveedor', $producto->proveedor) }}" 
                   class="input-field">
        </div>

        <div class="form-actions">
            <a href="{{ route('productos.index') }}" class="btn-cancelar">⬅️ Volver</a>
            <button type="submit" class="btn-guardar">💾 Actualizar</button>
        </div>
    </form>
</div>
@endsection
