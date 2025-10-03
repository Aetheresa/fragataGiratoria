<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InsumoController;

/*
|--------------------------------------------------------------------------
| Rutas públicas
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('inicio');

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

// Registro
Route::get('/registro', [RegisterController::class, 'showRegistrationForm'])->name('registro');
Route::post('/registro', [RegisterController::class, 'register'])->name('registro.submit');

// Páginas públicas
Route::get('/contacto', fn() => view('contacto'))->name('contacto');
Route::get('/carrito', fn() => view('carrito'))->name('carrito');

/*
|--------------------------------------------------------------------------
| Rutas protegidas (requieren login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/menu', fn() => view('menu'))->name('menu');

    // CRUD empleados
    Route::resource('employee', EmployeeController::class)->names('employee');

    // Cerrar sesión
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // ✅ CRUDs principales
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('insumos', InsumoController::class);
    Route::resource('productos', ProductoController::class);

    // ✅ Exportar a PDF
    Route::get('/usuarios/pdf', [UsuarioController::class, 'exportarPDF'])->name('usuarios.pdf');
    Route::get('/insumos/pdf', [InsumoController::class, 'exportarPDF'])->name('insumos.pdf');
    Route::get('/productos/pdf', [ProductoController::class, 'exportarPDF'])->name('productos.pdf');
});

/*
|--------------------------------------------------------------------------
| Otras vistas
|--------------------------------------------------------------------------
*/
Route::get('/registros', fn() => view('registros.index'))->name('registros');
Route::get('/pedidos', fn() => view('pedidos.index'))->name('pedidos');
Route::get('/precios', fn() => view('precios.index'))->name('precios');
Route::get('/ajustes', fn() => view('ajustes.index'))->name('ajustes');
Route::get('/ayuda', fn() => view('ayuda.index'))->name('ayuda');
Route::get('/salir', fn() => redirect()->route('inicio'))->name('salir');
