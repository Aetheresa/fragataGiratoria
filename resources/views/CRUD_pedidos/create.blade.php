@extends('layouts.sidebar')

@section('title', 'Crear Pedido')

@section('content')
<link rel="stylesheet" href="{{ asset('css/createpedidos.css') }}">

<div class="dashboard-box">
    <h1 class="text-2xl font-bold mb-4">➕ Crear Pedido</h1>

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

    <form action="{{ route('pedidos.store') }}" method="POST" class="form-container">
        @csrf

        <div class="form-group">
            <label>Fecha y Hora</label>
            <input type="datetime-local" name="fecha_hora" class="input-field" required>
        </div>

        <div class="form-group">
            <label>Tiempo Estimado (HH:MM:SS)</label>
            <input type="time" name="tiempo_estimado" class="input-field">
        </div>

        <div class="form-group">
            <label>Total a Pagar</label>
            <input type="number" step="0.01" name="total_a_pagar" class="input-field" required>
        </div>

        <div class="form-group">
            <label>Nombre del Platillo</label>
            <input type="text" name="nombre_platillo" class="input-field">
        </div>

        <div class="form-group">
            <label>ID Mesa</label>
            <input type="number" name="id_mesa" class="input-field" required>
        </div>

        <div class="form-group">
            <label>ID Estado del Pedido</label>
            <input type="number" name="id_estado_pedido" class="input-field" required>
        </div>

        <div class="form-buttons">
            <a href="{{ route('pedidos.index') }}" class="btn-cancelar">⬅️ Volver</a>
            <button type="submit" class="btn-guardar">💾 Guardar Pedido</button>
        </div>
    </form>
</div>
@endsection
