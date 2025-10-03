@extends('layouts.sidebar')

@section('title', 'Crear Producto')

@section('content')
<link rel="stylesheet" href="{{ asset('css/productos.css') }}">

<div class="dashboard-box">
    <h1>➕ Crear Producto</h1>

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="nombre" required>
        </div>

        <div class="form-group">
            <label>Descripción</label>
            <textarea name="descripcion"></textarea>
        </div>

        <div class="form-group">
            <label>Precio</label>
            <input type="number" step="0.01" name="precio">
        </div>

        <div class="form-group">
            <label>Stock</label>
            <input type="number" name="stock">
        </div>

        <button type="submit" class="btn guardar">Guardar</button>
    </form>
</div>
@endsection
