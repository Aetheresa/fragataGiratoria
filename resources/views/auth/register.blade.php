<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Registro - La Fragata Giratoria</title>
  <link rel="stylesheet" href="{{ asset('css/registro.css') }}" />
</head>
<body>
  <header>
    <div class="logo-contenedor">
      <img src="{{ asset('JPG/icono-fragata.jpg') }}" alt="Icono Fragata" class="logo-img" />
      <span class="nombre-logo">La Fragata Giratoria</span>
    </div>
    <nav>
      <a href="{{ route('menu') }}">Menú</a>
      <a href="{{ route('inicio') }}">Inicio</a>
      <a href="{{ route('login') }}">Iniciar Sesión</a>
      <a href="{{ route('registro') }}">Registrarse</a>
      <a href="{{ route('contacto.form') }}">Contáctanos</a>
      <a href="{{ route('carrito') }}" class="icono-carrito" aria-label="Carrito">
        <img src="{{ asset('JPG/carrito.png') }}" alt="Icono carrito de compras" />
      </a>
    </nav>
  </header>

  <main class="contenido">
    <form class="formulario tarjeta" method="POST" action="{{ route('registro.submit') }}">
      @csrf
      <h2>Registro</h2>

      <label for="nombre">Nombre</label>
      <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required />

      <label for="tipoDocumento">Tipo de documento</label>
      <select id="tipoDocumento" name="tipoDocumento" required>
        <option value="">Seleccionar</option>
        <option>Cédula de ciudadanía</option>
        <option>Cédula extranjera</option>
        <option>Pasaporte</option>
      </select>

      <label for="documento">Documento</label>
      <input type="text" id="documento" name="documento" placeholder="Número de tu documento" />

      <label for="correo">Correo electrónico</label>
      <input type="email" id="correo" name="correo" placeholder="Ingresa tu correo electrónico" required />

      <label for="clave">Contraseña</label>
      <input type="password" id="clave" name="clave" placeholder="Ingresa tu contraseña" required />

      <label for="clave">Confirmar contraseña</label>
      <input type="password" id="clave" name="clave" placeholder="Ingresa nuevamente tu contraseña" required />
        
      <button type="submit" class="registrarse">Registrarse</button>
      <button type="button" class="cancelar" onclick="window.location.href='{{ route('inicio') }}'">Cancelar</button>
    </form>
  </main>
@include('layouts.footer')
</body>
</html>

