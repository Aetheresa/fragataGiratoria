<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Modelo que apunta a la tabla 'usuario'

class AuthController extends Controller
{
    /**
     * Maneja el inicio de sesión de un usuario.
     */
    public function login(Request $request)
    {
        // Validar credenciales
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Intentar autenticar
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate(); // seguridad: regenerar sesión
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ]);
    }

    /**
     * Maneja el registro de un nuevo usuario.
     */
    public function register(Request $request)
    {
        // Validar datos
        $validated = $request->validate([
            'email'    => 'required|email|unique:usuario,email', // 👈 cambiar "users" por "usuario"
            'password' => 'required|min:6|confirmed',
        ]);

        try {
            // Crear usuario
            $user = User::create([
                'email'    => $validated['email'],
                'password' => bcrypt($validated['password']),
            ]);

            Auth::login($user);

            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            return back()->withErrors([
                'email' => 'Hubo un problema al crear tu cuenta. Intenta nuevamente.',
            ]);
        }
    }
}
