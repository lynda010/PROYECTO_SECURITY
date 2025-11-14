<?php

namespace App\Http\Controllers;

use App\Models\Tipo_Curso;
use Illuminate\Http\Request;

class Tipo_CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiposCurso = Tipo_Curso::all();
        return view('tipo_cursos.index', compact('tiposCurso'));
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
            'nombre_tipo' => 'required|string|max:255',
        ]);

        Tipo_Curso::create([
            'nombre_tipo' => $request->nombre_tipo,
        ]);

        return redirect()->route('tipo_cursos.index')
            ->with('success', 'Tipo de curso creado exitosamente.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tipo_curso = Tipo_Curso::findOrFail($id);
        return view('tipo_cursos.edit', compact('tipo_curso'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre_tipo' => 'required|string|max:255',
        ]);

        $tipo_curso = Tipo_Curso::findOrFail($id);
        $tipo_curso->update([
            'nombre_tipo' => $request->nombre_tipo,
        ]);

        return redirect()->route('tipo_cursos.index')
            ->with('success', 'Tipo de curso actualizado exitosamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $tipo = Tipo_Curso::findOrFail($id);

    if ($tipo->cursos()->count() > 0) {
        return back()->with('error', 'No se puede eliminar este Tipo de Curso porque tiene cursos asociados.');
    }

    $tipo->delete();

    return back()->with('success', 'Tipo de Curso eliminado correctamente.');
}
}