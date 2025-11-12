<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Pago;
use Illuminate\Http\Request;


class pagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = pago::all();
        return view('pagos.index', compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Trae los datos que la vista necesita
        $alumnos = Alumno::all();
        $cursos  = Curso::all();

        // Envía ambas variables a la vista
        return view('pagos.create', compact('alumnos', 'cursos'));
    }
    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        // Trae los datos que la vista necesita
        $alumnos = Alumno::all();
        $cursos  = Curso::all();
        $pago = pago::find($id);

        return view('pagos.edit', compact('pago','alumnos', 'cursos'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        $pago = pago::findorfail($id);
        $pago->update($request->all());


        return redirect()->route('pagos.index')
            ->with('success', 'Pago actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        pago::find($id)->delete();
        return redirect()->route('pagos.index')
            ->with('success', 'Pago eliminado exitosamente.');
    }
}
