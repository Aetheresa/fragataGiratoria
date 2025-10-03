<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Inicio - La Fragata Giratoria</title>

  {{-- Enlazar CSS --}}
  <link rel="stylesheet" href="{{ asset('css/inicio.css') }}"/>

  {{-- FontAwesome --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body>

  <header>
    <div class="logo-contenedor">
      <img src="{{ asset('JPG/icono-fragata.jpg') }}" alt="Icono Fragata" class="logo-img" />
      <span class="nombre-logo">La Fragata Giratoria</span>
    </div>
    <nav>
      <!-- Aquí están los enlaces a las páginas -->
      <a href="{{ route('menu') }}">Menú</a>
      <a href="{{ route('inicio') }}">Inicio</a>
      <a href="{{ route('login') }}">Iniciar Sesión</a>
      <a href="{{ route('register') }}">Registrarse</a>
      <a href="{{ route('contacto.form') }}">Contáctanos</a>
      <a href="{{ route('carrito') }}" class="icono-carrito" aria-label="Carrito">
        <img src="{{ asset('JPG/carrito.png') }}" alt="Icono carrito de compras" />
      </a>
    </nav>
  </header>

  <main class="contenido">
    <section class="tarjeta-bienvenida">
      <h2><span class="resaltado">Bienvenido a</span><br>La Fragata Giratoria</h2>
      <p>Una experiencia gastronómica sobre el mar</p>
      
      <!-- Botones que redirigen a las páginas correspondientes -->
      <a href="{{ route('menu') }}">
        <button class="boton-ver-menu">Ver menú</button>
      </a>
    </section>
  </main>
@include('layouts.footer')
</body>
</html>
