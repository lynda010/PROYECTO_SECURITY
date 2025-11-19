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
    // Ajusta los nombres de modelo/relaciones según tu proyecto
    $alumno_completa_modulos = \App\Models\alumno_completa_modulo::with([
        'alumno',
        'modulo.curso',    // si la relación modulo->curso existe
        
    ])->get();

    return view('alumno_completa_modulos.index', compact('alumno_completa_modulos'));
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
    public function edit($id)
    {

        $alumnos = Alumno::all();
        $modulos = modulo::with('curso')->get();
        $alumno_completa_modulo = alumno_completa_modulo::findorfail($id);
        return view('alumno_completa_modulos.edit', compact('alumno_completa_modulo','alumnos','modulos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $alumno_completa_modulo = alumno_completa_modulo::findorfail($id);
        $alumno_completa_modulo->update($request->all());

        return redirect()->route('alumno_completa_modulos.index')
            ->with('success', 'Registro actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        
        $alumno_completa_modulo = alumno_completa_modulo::findorfail($id);
        $alumno_completa_modulo->delete();

        return redirect()->route('alumno_completa_modulos.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }



    public function createMasivo()
    {
        $alumnos = Alumno::all();
        $modulos = modulo::with('curso')->get();

        return view('alumno_completa_modulos.createMasivo', compact('alumnos', 'modulos'));
    }


    public function storeMasivo(Request $request)
{
    $request->validate([
        'fecha_finalizacion' => 'required|date',
        'estado' => 'required|string|max:50',

        // varios alumnos
        'alumno_ids' => 'required|array',
        'alumno_ids.*' => 'exists:alumno,id',

        // varios módulos
        'modulo_ids' => 'required|array',
        'modulo_ids.*' => 'exists:modulos,id',
    ]);

    // Crear todos los registros combinando alumno × módulo
    foreach ($request->alumno_ids as $alumno_id) {
        foreach ($request->modulo_ids as $modulo_id) {
            alumno_completa_modulo::create([
                'fecha_finalizacion' => $request->fecha_finalizacion,
                'estado' => $request->estado,
                'alumno_id' => $alumno_id,
                'modulo_id' => $modulo_id,
            ]);
        }
    }

    return redirect()->route('alumno_completa_modulos.index')
        ->with('success', 'Registros masivos creados exitosamente.');
}





}
