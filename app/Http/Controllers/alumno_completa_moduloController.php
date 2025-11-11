<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\alumno_completa_modulo;
use App\Models\modulo;
use Illuminate\Http\Request;

class alumno_completa_moduloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registros = alumno_completa_modulo::all();
        return view('alumno_completa_modulos.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alumnos = Alumno::all();
        $modulos = modulo::with('curso')->get();

        return view('alumno_completa_modulos.create', compact('alumnos', 'modulos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'fecha_finalizacion' => 'required|date',
            'estado' => 'required|string|max:50',
            'alumno_id' => 'required|exists:alumno,id',
            'modulo_id' => 'required|exists:modulos,id',
        ]);

        alumno_completa_modulo::create($request->all());

        
        return redirect()->route('alumno_completa_modulos.index')
            ->with('success', 'Registro creado exitosamente.');
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
        $alumno_completa_modulo = alumno_completa_modulo::find($id);
        return view('alumno_completa_modulos.edit', compact('alumno_completa_modulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        alumno_completa_modulo::find($id)->update($request->validate());
        return redirect()->route('alumno_completa_modulos.index')
            ->with('success', 'Registro actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        alumno_completa_modulo::find($id)->delete();
        return redirect()->route('alumno_completa_modulos.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}
