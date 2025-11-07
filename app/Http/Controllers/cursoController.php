<?php

namespace App\Http\Controllers;

use App\Models\curso;         
use App\Models\Tipo_Curso;    
use Illuminate\Http\Request;

class cursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = curso::all();
        return view('cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $tiposCurso = Tipo_Curso::all();

        
        return view('cursos.create', compact('tiposCurso'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'nombre_curso' => 'required|string|max:100',
            'valor' => 'required|numeric',
            'duracion_horas' => 'required|integer',
            'duracion_dias_presencial' => 'required|integer',
            'tipo_curso_id' => 'required|exists:tipo_curso,id',

        ]);

        
        curso::create($data);

        return redirect()->route('cursos.index')
            ->with('success', 'Curso creado exitosamente.');
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
        $curso = curso::findOrFail($id);
        $tiposCurso = Tipo_Curso::all(); 
        return view('cursos.edit', compact('curso', 'tiposCurso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $curso = curso::findOrFail($id);

        $data = $request->validate([
            'nombre_curso' => 'required|string|max:100',
            'valor' => 'required|numeric',
            'duracion_horas' => 'required|integer',
            'duracion_dias_presencial' => 'required|integer',
            'tipo_curso_id' => 'required|exists:tipo_curso,id',

        ]);

        $curso->update($data);

        return redirect()->route('cursos.index')
            ->with('success', 'Curso actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $curso = curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('cursos.index')
            ->with('success', 'Curso eliminado correctamente.');
    }
}
