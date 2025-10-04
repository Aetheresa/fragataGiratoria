<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Employee\LoginUsuarioController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\PlatilloController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\MetodoDePagoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CarritoController;

/*
|--------------------------------------------------------------------------
| Rutas Públicas
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => view('welcome'))->name('inicio');

/* 🔐 Autenticación */
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/registro', [RegisterController::class, 'showRegistrationForm'])->name('registro');
Route::post('/registro', [RegisterController::class, 'register'])->name('registro.submit');

/* 📞 Contacto */
Route::get('/contacto', [ContactController::class, 'mostrarFormulario'])->name('contacto.form');
Route::post('/contacto', [ContactController::class, 'enviar'])->name('contacto.enviar');

/* 🍽️ Menú público */
Route::get('/menu', fn() => view('menu'))->name('menu');

/* 🛒 Carrito (público) */
Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito');
Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
Route::post('/carrito/eliminar/{nombre}', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');
Route::post('/carrito/vaciar', [CarritoController::class, 'vaciar'])->name('carrito.vaciar');

/*
|--------------------------------------------------------------------------
| Rutas Protegidas (requieren login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {

    /* 📊 Dashboard */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /* 👥 Empleados */
    Route::resource('employee', EmployeeController::class)->names('employee');
    Route::get('/employee/loginusuarios', [LoginUsuarioController::class, 'index'])
        ->name('employee.loginusuarios');

    /* 🚪 Logout */
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    /* ✅ CRUDs principales */
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('compras', CompraController::class);

    /* Platillos: manejo de edit sin ID */
    Route::get('platillos/edit', function () {
        $platillo = \App\Models\Platillo::first() ?? \App\Models\Platillo::create([
            'nombre_platillo' => 'Nuevo platillo temporal',
            'descripcion' => 'Descripción temporal',
            'precio' => 0,
            'id_adicional' => null,
        ]);
        return redirect()->route('platillos.edit', $platillo);
    });
    Route::resource('platillos', PlatilloController::class);

    /* Otros CRUD */
    Route::resource('pedidos', PedidoController::class);
    Route::resource('metodosdepago', MetodoDePagoController::class);

    /* 📄 Exportación a PDF */
    Route::get('/usuarios/pdf', [UsuarioController::class, 'exportarPDF'])->name('usuarios.pdf');
    Route::get('/productos/pdf', [ProductoController::class, 'exportarPDF'])->name('productos.pdf');
    Route::get('/compras/pdf', [CompraController::class, 'exportarPDF'])->name('compras.pdf');
});

/*
|--------------------------------------------------------------------------
| Sidebar / vistas rápidas
|--------------------------------------------------------------------------
*/
Route::get('/reportes', fn() => view('reportes.index'))->name('reportes');
Route::get('/registros', fn() => view('registros.index'))->name('registros');
Route::get('/insumos', fn() => view('insumos.index'))->name('insumos');
Route::get('/pedidos', fn() => view('pedidos.index'))->name('pedidos');
Route::get('/precios', fn() => view('precios.index'))->name('precios');
Route::get('/ajustes', fn() => view('ajustes.index'))->name('ajustes');
Route::get('/ayuda', fn() => view('ayuda.index'))->name('ayuda');

/* 🔄 Salir (redirección al inicio) */
Route::get('/salir', fn() => redirect()->route('inicio'))->name('salir');

