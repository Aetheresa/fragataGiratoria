@extends('layouts.sidebar')

@section('content')
<link rel="stylesheet" href="{{ asset('css/bienvenida.css') }}">

<div class="dashboard-wrapper">
    <div class="welcome-container">
        <h1>🍽️ Bienvenido al Sistema de Gestión</h1>
        <p>
            Este panel te permitirá administrar los <strong>usuarios</strong>, 
            <strong>productos</strong> y <strong>compras</strong> de tu restaurante.
        </p>

        <div class="stats-preview">
            <div class="stat-card">
                <h2>{{ \App\Models\User::count() }}</h2>
                <span>Usuarios registrados</span>
            </div>
            <div class="stat-card">
                <h2>{{ \App\Models\Producto::count() }}</h2>
                <span>Productos activos</span>
            </div>
            <div class="stat-card">
                <h2>{{ \App\Models\Compra::count() }}</h2>
                <span>Compras registradas</span>
            </div>
        </div>

        <a href="{{ route('login') }}" class="welcome-btn">Salir Del dashboard</a>
    </div>
</div>
@endsection
