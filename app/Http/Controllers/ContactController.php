<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function mostrarFormulario()
    {
        return view('contacto'); // resources/views/contacto.blade.php
    }

    public function enviar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'asunto' => 'required|string|max:255',
            'mensaje' => 'required|string',
        ]);

        $data = $request->only('nombre', 'email', 'asunto', 'mensaje');

        // Enviar correo
    Mail::send('emails.contacto', ['data' => $data], function ($message) use ($data) {
        $message->to('arlcornd@gmail.com', 'Administrador')
            ->cc('nm891678@gmail.com') // copia visible
            ->subject('Nuevo mensaje de contacto: ' . $data['asunto'])
            ->from($data['email'], $data['nombre']);
});

        return back()->with('success', '¡Tu mensaje ha sido enviado con éxito!');
    }
}
