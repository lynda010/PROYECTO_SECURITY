<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /**
     * Mostrar todos los grupos
     */
    public function index()
    {
        $grupos = Grupo::all();
        return view('grupos.index', compact('grupos'));
    }

    /**
     * Formulario de creación
     */
    public function create()
    {
        return view('grupos.create');
    }

    /**
     * Guardar un grupo nuevo
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_grupo' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
        ]);

        Grupo::create([
            'nombre_grupo' => $request->nombre_grupo,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('grupos.index')
            ->with('success', 'Grupo creado exitosamente.');
    }


    /**
     * Mostrar formulario de edición
     */
    public function edit($id)
    {
        $grupo = Grupo::findOrFail($id);
        return view('grupos.edit', compact('grupo'));
    }


    /**
     * Actualizar grupo
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_grupo' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
        ]);

        $grupo = Grupo::findOrFail($id);

        $grupo->update([
            'nombre_grupo' => $request->nombre_grupo,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('grupos.index')
            ->with('success', 'Grupo actualizado exitosamente.');
    }


    /**
     * Eliminar grupo
     */
    public function destroy($id)
    {
        Grupo::findorFail($id)->delete();

        return redirect()->route('grupos.index')
            ->with('success', 'Grupo eliminado exitosamente.');
    }

    /**
     * Mostrar detalle del grupo
     */
    public function detalle($id)
{
    // Obtener grupo
    $grupo = Grupo::findOrFail($id);

    // Alumnos desde la tabla pivote
    $alumnos = $grupo->alumnos;

    // Contar alumnos
    $totalAlumnos = $grupo->alumnos()->count();

    return view('grupos.detalle', compact('grupo', 'alumnos', 'totalAlumnos'));
}


}
