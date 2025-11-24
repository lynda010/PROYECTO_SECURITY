<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use PDF; 

class PdfController extends Controller
{
    public function generatePdf()
    {
        
        $pdf = FacadePdf::loadView('pdf.example');

        
        return $pdf->stream('ejemplo.pdf');
    }
}