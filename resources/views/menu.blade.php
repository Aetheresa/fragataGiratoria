<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal</title>
</head>
<body>
    <h1>Bienvenido {{ Auth::user()->nombre_usuario ?? 'Usuario' }}</h1>
    <p>Has iniciado sesión correctamente 🎉</p>

    <nav>
        <ul>
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('contacto') }}">Contacto</a></li>
            <li><a href="{{ route('carrito') }}">Carrito</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
            </li>
        </ul>
    </nav>
</body>
</html>
