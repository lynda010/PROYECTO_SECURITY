<?php

namespace App\Http\Controllers;

use App\Models\curso;
use Illuminate\Http\Request;

class cursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = curso::all();
        return view('curso.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('curso.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_curso' => 'required|string|max:100',
            'valor' => 'required|numeric',
            'duracion_horas' => 'required|integer',
            'duracion_dias_presencial' => 'required|integer',
            
        ]);

        curso::create($request->all());

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
        $curso = curso::find($id);
        return view('cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Curso::find($id)->update($request->validate());
        return redirect()->route('cursos.index')
            ->with('success', 'Curso actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }
}
