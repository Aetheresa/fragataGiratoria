@extends('layouts.sidebar')

@section('title', 'Editar Producto')

@section('content')
<link rel="stylesheet" href="{{ asset('css/productos.css') }}">

<div class="dashboard-box">
    <h1>✏️ Editar Producto</h1>

    <form action="{{ route('productos.update', $producto->id_producto) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion">{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" step="0.01" name="precio" value="{{ old('precio', $producto->precio) }}">
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" value="{{ old('stock', $producto->stock) }}">
        </div>

        <button type="submit" class="btn guardar">Actualizar</button>
    </form>
</div>
@endsection
