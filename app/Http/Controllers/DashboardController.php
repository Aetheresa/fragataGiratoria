<?php

// DashboardController.php
namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\User;
use App\Models\Usuario;

class DashboardController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        $users = User::all();
        $compras = Compra::all();

        return view('dashboard', compact('usuarios', 'users', 'compras'));
    }
}
