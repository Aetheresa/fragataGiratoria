@extends('layouts.sidebar')

@section('title', 'Crear Usuario')

@section('content')
    <h2 class="text-2xl font-bold mb-6">➕ Crear Usuario</h2>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <strong>Oops!</strong> Corrige los siguientes errores:
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.store') }}" method="POST" class="bg-white p-6 shadow rounded-lg">
        @csrf
        <div class="mb-4">
            <label class="block">Usuario</label>
            <input type="text" name="usuario" value="{{ old('usuario') }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block">Nombre completo</label>
            <input type="text" name="nombre_usuario" value="{{ old('nombre_usuario') }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block">Correo electrónico</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block">Contraseña</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block">Rol</label>
            <input type="text" name="rol" value="{{ old('rol') }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('usuarios.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">⬅️ Volver</a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">✅ Guardar</button>
        </div>
    </form>
@endsection
