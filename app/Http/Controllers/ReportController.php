<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function usuariosPDF()
    {
        $usuarios = Usuario::all();

        // Cargar la vista y pasarle datos
        $pdf = Pdf::loadView('reportes.usuarios', compact('usuarios'));

        // Descargar PDF
        return $pdf->download('usuarios_reporte.pdf');
    }
}
