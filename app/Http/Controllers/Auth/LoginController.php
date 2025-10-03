<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Mostrar formulario de login
    public function showLoginForm()
    {
        return view('auth.login'); // asegúrate que exista resources/views/auth/login.blade.php
    }

    // Procesar login
    public function login(Request $request)
    {
        // Validar campos
        $request->validate([
            'email'    => 'required|string', // puede ser correo o usuario
            'password' => 'required|string',
        ]);

        // Detectar si es correo o nombre de usuario
        $loginField = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'usuario';

        $credentials = [
            $loginField => $request->email,
            'password'  => $request->password,
        ];

        // Intentar login
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard'); // redirige al dashboard
        }

        // Si falla
        return back()->withErrors([
            'email' => 'Credenciales incorrectas',
        ])->withInput();
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); // vuelve al login
    }
}
