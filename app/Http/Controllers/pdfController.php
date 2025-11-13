<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use PDF; // Importa la fachada PDF

class PdfController extends Controller
{
    public function generatePdf()
    {
        // Carga la vista y pasa datos si es necesario
        $pdf = FacadePdf::loadView('pdf.example');

        // Retorna el PDF al navegador
        return $pdf->stream('ejemplo.pdf');
    }
}