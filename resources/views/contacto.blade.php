<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contáctanos - La Fragata Giratoria</title>

  {{-- CSS principal --}}
  <link rel="stylesheet" href="{{ asset('css/contacto.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>
  <header>
    <div class="logo-contenedor">
      {{-- Logo --}}
      <img src="{{ asset('JPG/icono-fragata.jpg') }}" alt="Icono Fragata" class="logo-img" />
      <span class="nombre-logo">La Fragata Giratoria</span>
    </div>
    <nav>
      <a href="{{ url('/menu') }}">Menú</a>
      <a href="{{ url('/') }}">Inicio</a>
      <a href="{{ url('/login') }}">Iniciar Sesión</a>
      <a href="{{ url('/register') }}">Registrarse</a>
      <a href="{{ route('contacto.form') }}">Contáctanos</a>
      <a href="{{ url('/carrito') }}" class="icono-carrito" aria-label="Carrito">
        {{-- Carrito --}}
        <img src="{{ asset('JPG/carrito.png') }}" alt="Carrito de compras" />
      </a>
    </nav>
  </header>

  <main class="contenido">
    <div class="formulario tarjeta">

      {{-- Mensaje de éxito --}}
      @if(session('success'))
        <div class="alerta-exito auto-hide">
          <i class="fa fa-check-circle"></i> {{ session('success') }}
        </div>
      @endif

      {{-- Mensajes de error --}}
      @if($errors->any())
        <div class="alerta-error auto-hide">
          <i class="fa fa-exclamation-triangle"></i> Corrige lo siguiente:
          <ul>
            @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('contacto.enviar') }}">
        @csrf
        <h2>Contáctanos</h2>

        <div class="input-con-icono">
          <i class="fa fa-user"></i>
          <input type="text" name="nombre" placeholder="Nombre completo" required />
        </div>

        <div class="input-con-icono">
          <i class="fa fa-envelope"></i>
          <input type="email" name="email" placeholder="Correo electrónico" required />
        </div>

        <div class="input-con-icono">
          <i class="fa fa-pen"></i>
          <input type="text" name="asunto" placeholder="Asunto" required />
        </div>

        <div class="input-sin-icono">
          <textarea name="mensaje" placeholder="Mensaje" required></textarea>
        </div>

        <button type="submit" class="ingresar">Enviar</button>
      </form>
    </div>
  </main>

  {{-- Script para ocultar alertas automáticamente --}}
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const alerts = document.querySelectorAll(".auto-hide");
      alerts.forEach(alert => {
        setTimeout(() => {
          alert.style.opacity = "0";
          alert.style.transition = "opacity 0.9s ease";
          setTimeout(() => alert.remove(), 500);
        }, 8000); // 4 segundos visibles
      });
    });
  </script>
@include('layouts.footer')
</body>
</html>
