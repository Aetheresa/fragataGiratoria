<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Iniciar Sesión - La Fragata Giratoria</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
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
    <form class="formulario tarjeta" method="POST" action="{{ route('login.submit') }}">
      @csrf
      <h2>Iniciar Sesión</h2>

      <!-- Mostrar errores de validación -->
      @if($errors->any())
        <div class="errores">
          @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
      @endif

      <div class="input-con-icono">
        <i class="fa fa-user"></i>
        <input type="text" id="correo" name="email" placeholder="Usuario o correo electrónico" value="{{ old('email') }}" required autofocus />
      </div>

      <div class="input-con-icono">
        <i class="fa fa-lock"></i>
        <input type="password" id="clave" name="password" placeholder="Contraseña" required />
      </div>

      <div class="recordarme">
        <label>
          <input type="checkbox" id="recordarme" name="remember" {{ old('remember') ? 'checked' : '' }} /> Recordarme
        </label>
      </div>

      <button type="submit" class="ingresar">Ingresar</button>

      <p class="enlace">
        <span class="texto-normal">¿Has olvidado tu</span> <a href="#">contraseña</a><span class="texto-normal">?</span>
      </p>

      <p class="enlace registro">
        <span class="texto-normal">¿No tienes una cuenta?</span>
        <a href="{{ route('registro') }}">Regístrate</a>
      </p>
    </form>
  </main>
@include('layouts.footer')
</body>
</html>
