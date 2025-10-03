<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function form()
    {
        return view('auth.contacto');
    }

    public function enviar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'asunto' => 'required|string|max:255',
            'mensaje' => 'required|string',
        ]);

        // Aquí iría el envío de correo
        Mail::raw($request->mensaje, function ($mail) use ($request) {
            $mail->to('arlcornd@gmail.com')
                 ->subject($request->asunto)
                 ->from($request->email, $request->nombre);
        });

        return back()->with('success', 'Tu mensaje fue enviado correctamente.');
    }
}

