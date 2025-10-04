@extends('layouts.sidebar')

@section('title', 'Nuevo Método de Pago')

@section('content')
<link rel="stylesheet" href="{{ asset('css/crearpagos.css') }}">
<div class="dashboard-box">
    <h1 class="text-2xl font-bold mb-4">➕ Nuevo Método de Pago</h1>

    <form action="{{ route('metodosdepago.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-bold">Nombre del Método</label>
            <input type="text" name="nombre_metodo" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
            <label class="block font-bold">ID Usuario</label>
            <input type="number" name="id_usuario" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div>
            <label class="block font-bold">ID Pedido</label>
            <input type="number" name="id_pedido" class="w-full border px-3 py-2 rounded" required>
        </div>

        <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
            💾 Guardar
        </button>
    </form>
</div>
@endsection
