<?php

namespace App\Http\Controllers;

use App\Models\alumno_toma_curso;
use Illuminate\Http\Request;

class alumno_toma_cursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registros = alumno_toma_curso::all();
        return view('alumno_toma_cursos.index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumno_toma_cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        'calificacion' => 'required|numeric|min:0|max:10',
        'aprobado' => 'required|boolean',
        'alumno_id' => 'required|exists:alumno,id',
        'curso_id' => 'required|exists:curso,id',
    ]);

    alumno_toma_curso::create($request->all());

    return redirect()->route('alumno_toma_cursos.index')
        ->with('success', 'El registro del alumno en el curso se creó exitosamente.');
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
        $alumno_toma_curso = alumno_toma_curso::find($id);
        return view('alumno_toma_cursos.edit', compact('alumno_toma_curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        alumno_toma_curso::find($id)->update($request->validate());
        return redirect()->route('alumno_toma_cursos.index')
            ->with('success', 'Registro actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        alumno_toma_curso::find($id)->delete();
        return redirect()->route('alumno_toma_cursos.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }
}
