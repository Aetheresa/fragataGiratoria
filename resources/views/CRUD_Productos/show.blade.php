@extends('layouts.sidebar')

@section('title', '📦 Detalle de Producto')

@section('content')
<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

<div class="dashboard-box">
    <h1>📦 Detalle del Producto</h1>

    <table class="table-productos">
        <tr>
            <th>ID</th>
            <td>{{ $producto->id_producto }}</td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td>{{ $producto->nombre_producto }}</td>
        </tr>
        <tr>
            <th>Tipo</th>
            <td>{{ $producto->tipo_producto }}</td>
        </tr>
        <tr>
            <th>Unidad</th>
            <td>{{ $producto->unidad_medida }}</td>
        </tr>
        <tr>
            <th>Cantidad Disponible</th>
            <td>{{ $producto->cantidad_disponible }}</td>
        </tr>
        <tr>
            <th>Stock Inicial</th>
            <td>{{ $producto->stock_inicial }}</td>
        </tr>
        <tr>
            <th>Stock Final</th>
            <td>{{ $producto->stock_final }}</td>
        </tr>
        <tr>
            <th>Stock Mínimo</th>
            <td>{{ $producto->stock_minimo }}</td>
        </tr>
        <tr>
            <th>Proveedor</th>
            <td>{{ $producto->proveedor }}</td>
        </tr>
    </table>

    <div class="actions-header" style="margin-top:20px;">
        <a href="{{ route('productos.index') }}" class="btn-agregar" style="background:#6b7280;">
            ⬅️ Volver
        </a>
        <a href="{{ route('productos.edit', $producto->id_producto) }}" class="btn edit">
            ✏️ Editar
        </a>
        <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" style="display:inline" onsubmit="return confirm('¿Seguro de borrar este producto?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn delete">🗑️ Eliminar</button>
        </form>
    </div>
</div>
@endsection
