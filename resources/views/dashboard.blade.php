@extends('layouts.sidebar')

@section('title', 'Dashboard')

@section('content')
    <!-- Vinculamos el CSS -->
    <link rel="stylesheet" href="{{ asset('css/bienvenida.css') }}">

    <div class="welcome-hero">
        <h1 class="welcome-title">👋 Bienvenido, Administrador</h1>
        <p class="welcome-subtitle">Este es tu panel principal para gestionar todo el sistema.</p>

        <!-- 🔥 Métricas rápidas dentro del bloque -->
        <div class="quick-stats">
            <div class="stat">
                <span class="stat-title">Pedidos Pendientes</span>
                <span class="stat-value">124</span>
            </div>
            <div class="stat">
                <span class="stat-title">Usuarios Activos</span>
                <span class="stat-value">582</span>
            </div>
            <div class="stat">
                <span class="stat-title">Ventas Hoy</span>
                <span class="stat-value">$4.2K</span>
            </div>
        </div>
    </div>
@endsection
