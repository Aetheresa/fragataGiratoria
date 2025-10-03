<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Producto;
use App\Models\Compra;
use App\Models\Platillo; 

class DashboardController extends Controller
{
    public function index()
    {
        $usuarios = User::count();
        $productos = Producto::count();
        $compras = Compra::count();
        $platillo = platillo::count(); 

        return view('dashboard', compact(
            'usuarios',
            'productos',
            'compras',
            'platillo'
        ));
    }
}
