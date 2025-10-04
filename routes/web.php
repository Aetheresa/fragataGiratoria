<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\PlatilloController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\MetodoDePagoController;

Route::get('/', fn() => view('welcome'))->name('inicio');

// Login & registro
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/registro', [RegisterController::class, 'showRegistrationForm'])->name('registro');
Route::post('/registro', [RegisterController::class, 'register'])->name('registro.submit');

// Páginas públicas
Route::get('/contacto', fn() => view('contacto'))->name('contacto');
Route::get('/carrito', fn() => view('carrito'))->name('carrito');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/menu', fn() => view('menu'))->name('menu');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // CRUD principales
    Route::resource('employee', EmployeeController::class)->names('employee');
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('compras', CompraController::class);

    // Platillos: manejo de edit sin ID
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

    // Otros CRUD
    Route::resource('pedidos', PedidoController::class);

    // ✅ Métodos de pago
    Route::resource('metodosdepago', MetodoDePagoController::class);

    // Exportar PDF
    Route::get('/usuarios/pdf', [UsuarioController::class, 'exportarPDF'])->name('usuarios.pdf');
    Route::get('/productos/pdf', [ProductoController::class, 'exportarPDF'])->name('productos.pdf');
    Route::get('/compras/pdf', [CompraController::class, 'exportarPDF'])->name('compras.pdf');
});

// Otras vistas
Route::get('/precios', fn() => view('precios.index'))->name('precios');
Route::get('/ajustes', fn() => view('ajustes.index'))->name('ajustes');
Route::get('/ayuda', fn() => view('ayuda.index'))->name('ayuda');
Route::get('/salir', fn() => redirect()->route('inicio'))->name('salir');
