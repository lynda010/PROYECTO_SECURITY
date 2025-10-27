<?php

namespace App\Http\Controllers;

use App\Models\tipo_curso;
use Illuminate\Http\Request;


class tipo_cursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos_cursos = tipo_curso::all();
        return view('tipo_cursos.index', compact('tipos_cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipo_cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_curso' => 'required|string|max:255',
        ]);

        tipo_curso::create($request->all());

        return redirect()->route('tipo_cursos.index')
                        ->with('success', 'Tipo de curso creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipo_curso = tipo_curso::find($id);
        return view('tipo_cursos.edit', compact('tipo_curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        tipo_curso::find($id)->update($request->validate());
        return redirect()->route('tipo_cursos.index')
                        ->with('success', 'Tipo de curso actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tipo_curso = tipo_curso::find($id);
        $tipo_curso->delete();
        return redirect()->route('tipo_cursos.index')
                        ->with('success', 'Tipo de curso eliminado exitosamente.');
    }
}
