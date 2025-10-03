@extends('layouts.sidebar')

@section('title', 'Editar Pedido')

@section('content')
<link rel="stylesheet" href="{{ asset('css/pedidos.css') }}">

<div class="form-box">
    <h2 class="form-title">✏️ Editar Pedido</h2>

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

    <form action="{{ route('pedidos.update', $pedido->id_pedido) }}" method="POST" class="form-container">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Cliente</label>
            <select name="id_usuario" class="input-field" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id_usuario }}" {{ old('id_usuario', $pedido->id_usuario) == $usuario->id_usuario ? 'selected' : '' }}>
                        {{ $usuario->nombre_usuario }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label>Fecha del Pedido</label>
            <input type="datetime-local" name="fecha_pedido" value="{{ old('fecha_pedido', \Carbon\Carbon::parse($pedido->fecha_pedido)->format('Y-m-d\TH:i')) }}" class="input-field" required>
        </div>

        <div class="form-group">
            <label>Total</label>
            <input type="number" step="0.01" name="total" value="{{ old('total', $pedido->total) }}" class="input-field" required>
        </div>

        <div class="form-group">
            <label>Estado</label>
            <select name="estado" class="input-field" required>
                <option value="Pendiente" {{ old('estado', $pedido->estado) == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="Pagado" {{ old('estado', $pedido->estado) == 'Pagado' ? 'selected' : '' }}>Pagado</option>
                <option value="Enviado" {{ old('estado', $pedido->estado) == 'Enviado' ? 'selected' : '' }}>Enviado</option>
            </select>
        </div>

        <div class="form-buttons">
            <a href="{{ route('pedidos.index') }}" class="btn-cancelar">⬅️ Volver</a>
            <button type="submit" class="btn-guardar">💾 Actualizar</button>
        </div>
    </form>
</div>
@endsection
