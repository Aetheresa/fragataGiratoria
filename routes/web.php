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
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Rutas Públicas
|--------------------------------------------------------------------------
| Todo lo que puede ver cualquier usuario sin autenticarse
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

/* 🍽️ Menú (público) */
Route::get('/menu', fn() => view('menu'))->name('menu');

/* 🛒 Carrito (solo vista pública) */
Route::get('/carrito', fn() => view('carrito'))->name('carrito');


/*
|--------------------------------------------------------------------------
| Rutas Protegidas (requieren login)
|--------------------------------------------------------------------------
| Aquí solo entran usuarios autenticados
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
    Route::resource('platillos', PlatilloController::class);
    Route::resource('pedidos', PedidoController::class);

    /* 🛒 Carrito (acciones protegidas) */
    Route::post('/carrito/agregar', [CompraController::class, 'agregar'])->name('carrito.agregar');

    /* 📄 Exportación a PDF */
    Route::get('/usuarios/pdf', [UsuarioController::class, 'exportarPDF'])->name('usuarios.pdf');
    Route::get('/productos/pdf', [ProductoController::class, 'exportarPDF'])->name('productos.pdf');
    Route::get('/compras/pdf', [CompraController::class, 'exportarPDF'])->name('compras.pdf');
});


/*
|--------------------------------------------------------------------------
| Rutas del Sidebar (vistas rápidas)
|--------------------------------------------------------------------------
| Son accesos directos a secciones del sistema
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

