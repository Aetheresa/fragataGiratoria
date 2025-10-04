@extends('layouts.sidebar')

@section('title', 'Editar Pedido')

@section('content')
<link rel="stylesheet" href="{{ asset('css/editplatillo.css') }}">

<div class="dashboard-box">
    <h1 class="form-title">✏️ Editar Pedido</h1>

    <!-- Alertas -->
    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert-error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>⚠️ {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pedidos.update', $pedido->id_pedido) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="fecha_hora">Fecha y Hora</label>
            <input type="datetime-local" name="fecha_hora" id="fecha_hora"
                   class="input-field"
                   value="{{ old('fecha_hora', $pedido->fecha_hora) }}" required>
        </div>

        <div class="form-group">
            <label for="tiempo_estimado">Tiempo Estimado</label>
            <input type="time" name="tiempo_estimado" id="tiempo_estimado"
                   class="input-field"
                   value="{{ old('tiempo_estimado', $pedido->tiempo_estimado) }}">
        </div>

        <div class="form-group">
            <label for="total_a_pagar">Total a Pagar</label>
            <input type="number" step="0.01" name="total_a_pagar" id="total_a_pagar"
                   class="input-field"
                   value="{{ old('total_a_pagar', $pedido->total_a_pagar) }}" required>
        </div>

        <div class="form-group">
            <label for="nombre_platillo">Nombre Platillo</label>
            <input type="text" name="nombre_platillo" id="nombre_platillo"
                   class="input-field"
                   value="{{ old('nombre_platillo', $pedido->nombre_platillo) }}">
        </div>

        <div class="form-group">
            <label for="id_mesa">ID Mesa</label>
            <input type="number" name="id_mesa" id="id_mesa"
                   class="input-field"
                   value="{{ old('id_mesa', $pedido->id_mesa) }}" required>
        </div>

        <div class="form-group">
            <label for="id_estado_pedido">ID Estado Pedido</label>
            <input type="number" name="id_estado_pedido" id="id_estado_pedido"
                   class="input-field"
                   value="{{ old('id_estado_pedido', $pedido->id_estado_pedido) }}" required>
        </div>

        <!-- Botones -->
        <div class="form-actions">
            <a href="{{ route('pedidos.index') }}" class="btn-cancelar">⬅ Volver</a>
            <button type="submit" class="btn-guardar">💾 Actualizar</button>
        </div>
    </form>
</div>
@endsection
