<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Pago;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class pagoController extends Controller
{

    public function index()
    {
        $pagos = pago::all();
        return view('pagos.index', compact('pagos'));
    }


    public function create()
    {

        $alumnos = Alumno::all();
        $cursos  = Curso::all();


        return view('pagos.create', compact('alumnos', 'cursos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'alumno_id'   => 'required',
            'curso_id'    => 'required',
            'fecha_pago'  => 'required|date',
            'monto'       => 'required|numeric|min:0',
            'metodo_pago' => 'required|string|max:50',
            'estado_pago' => 'required|string|max:50',
        ]);

        Pago::create($validated);

        return redirect()->route('pagos.index')->with('success', 'Pago registrado correctamente.');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {


        $alumnos = Alumno::all();
        $cursos  = Curso::all();
        $pago = pago::find($id);

        return view('pagos.edit', compact('pago', 'alumnos', 'cursos'));
    }


    public function update(Request $request, $id)
    {

        $pago = pago::findorfail($id);
        $pago->update($request->all());


        return redirect()->route('pagos.index')
            ->with('success', 'Pago actualizado exitosamente.');
    }


    public function destroy(string $id)
    {
        pago::find($id)->delete();
        return redirect()->route('pagos.index')
            ->with('success', 'Pago eliminado exitosamente.');
    }




    public function generarPDF()
{
    $pagos = Pago::all();

    $pdf = Pdf::loadView('pdf.pagospdf', compact('pagos'));

    return $pdf->stream('reporte_pagos.pdf');
}
public function verpdfpagos()
{
    $pagos = Pago::all();

    $pdf = Pdf::loadView('pdf.pagospdf', compact('pagos'))
        ->setPaper('a4', 'landscape');

    return $pdf->stream('reporte_pagos.pdf');
}

}
