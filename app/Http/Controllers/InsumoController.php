<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InsumoController extends Controller
{
    public function index()
    {
        return view('insumos.index'); // 👈 Ajusta a la vista correcta
    }
}
