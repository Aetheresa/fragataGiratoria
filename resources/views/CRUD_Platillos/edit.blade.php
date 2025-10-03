@extends('layouts.sidebar')

@section('title', 'Editar Platillo')

@section('content')

<link rel="stylesheet" href="{{ asset('css/editplatillo.css') }}">

<div class="dashboard-box">
    <h1 class="text-2xl font-bold mb-4">✏️ Editar Platillo</h1>

    <form action="{{ route('platillos.update', $platillo->id_platillo) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Nombre</label>
            <input type="text" name="nombre_platillo" value="{{ $platillo->nombre_platillo }}" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Descripción</label>
            <textarea name="descripcion" class="w-full border p-2 rounded" required>{{ $platillo->descripcion }}</textarea>
        </div>

        <div>
            <label class="block font-semibold">Precio</label>
            <input type="number" step="0.01" name="precio" value="{{ $platillo->precio }}" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block font-semibold">Adicional</label>
            <input type="text" name="id_adicional" value="{{ $platillo->id_adicional }}" class="w-full border p-2 rounded">
        </div>

        <!-- Botones -->
        <div class="flex justify-end gap-4 mt-4">
            <button type="submit" class="btn-submit">💾 Guardar cambios</button>
            <a href="{{ route('platillos.index') }}" class="btn-cancel">❌ Cancelar</a>
        </div>
    </form>
</div>

@endsection
