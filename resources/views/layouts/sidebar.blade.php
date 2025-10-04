<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'La Fragata Giratoria')</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
    @vite('resources/css/app.css')
</head>
<body>
    <div style="display:flex; height:100vh; overflow:hidden;">
        
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-top">
                <!-- ✅ Logo -->
                <div class="logo">
                    La Fragata Giratoria
                </div>

                <!-- 🔍 Buscador -->
                <input class="search-input" type="search" id="search-input" placeholder="🔍 Búsqueda" />

                <!-- Menú principal -->
                <nav class="menu">
                    <a href="{{ route('dashboard') }}" class="nav-button {{ request()->routeIs('dashboard') ? 'active' : '' }}">Inicio</a>
                    <a href="{{ route('productos.index') }}" class="nav-button {{ request()->routeIs('productos.index') ? 'active' : '' }}">Productos</a>
                    <a href="{{ route('platillos.index') }}" class="nav-button {{ request()->routeIs('platillos.*') ? 'active' : '' }}">Platillos</a>
                    <a href="{{ route('compras.index') }}" class="nav-button {{ request()->routeIs('compras.*') ? 'active' : '' }}">Compras</a>
                    <a href="{{ route('pedidos.index') }}" class="nav-button {{ request()->routeIs('pedidos.*') ? 'active' : '' }}">Pedidos</a>
                    <a href="{{ route('usuarios.index') }}" class="nav-button {{ request()->routeIs('usuarios.*') ? 'active' : '' }}">Usuarios</a>
                    <a href="{{ route('metodosdepago.index') }}" class="nav-button {{ request()->routeIs('metodosdepago.*') ? 'active' : '' }}">Métodos de Pago</a>
                </nav>
            </div>

            <!-- Botones inferiores -->
            <div class="bottom-buttons">
                <a href="{{ route('ajustes') }}" class="nav-button {{ request()->routeIs('ajustes') ? 'active' : '' }}">Ajustes</a>
                <a href="{{ route('ayuda') }}" class="nav-button {{ request()->routeIs('ayuda') ? 'active' : '' }}">Ayuda</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-button">Salir</button>
                </form>
            </div>
        </aside>

        <!-- Contenido principal -->
        <main style="flex:1; overflow-y:auto; padding:1.5rem;">
            @yield('content')
        </main>
    </div>

    <!-- Código JavaScript que resalta los botones del menú -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const searchInput = document.getElementById("search-input");
            const navButtons = document.querySelectorAll(".nav-button");  // Todos los botones de navegación

            searchInput.addEventListener("input", function() {
                const searchTerm = searchInput.value.toLowerCase();

                navButtons.forEach(button => {
                    // Compara el texto del botón con el término de búsqueda
                    const buttonText = button.textContent.toLowerCase();

                    if (buttonText.includes(searchTerm)) {
                        // Resalta el botón si coincide
                        button.style.backgroundColor = "#ff8c00";  // Naranja bonito
                    } else {
                        // Restaura el color si no hay coincidencia
                        button.style.backgroundColor = "";  
                    }
                });
            });
        });
    </script>
</body>
</html>
