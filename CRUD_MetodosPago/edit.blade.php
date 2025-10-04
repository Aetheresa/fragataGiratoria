@extends('layouts.sidebar')

@section('title', 'Editar Método de Pago')

@section('content')
<link rel="stylesheet" href="{{ asset('css/editpago.css') }}">

<div class="dashboard-box">
    <h1 class="text-2xl font-bold mb-4">✏️ Editar Método de Pago</h1>

    <form action="{{ route('metodosdepago.update', $metodosdepago) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-bold">Nombre del Método</label>
            <input type="text" name="nombre_metodo"
                   value="{{ old('nombre_metodo', $metodosdepago->nombre_metodo) }}"
                   class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
            <label class="block font-bold">ID Usuario</label>
            <input type="number" name="id_usuario"
                   value="{{ old('id_usuario', $metodosdepago->id_usuario) }}"
                   class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
            <label class="block font-bold">ID Pedido</label>
            <input type="number" name="id_pedido"
                   value="{{ old('id_pedido', $metodosdepago->id_pedido) }}"
                   class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="form-actions flex justify-between mt-4">
            <a href="{{ route('metodosdepago.index') }}" class="btn-volver px-4 py-2 rounded border bg-gray-200 hover:bg-gray-300">
                ⬅️ Volver
            </a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                💾 Actualizar
            </button>
        </div>
    </form>
</div>
@endsection
