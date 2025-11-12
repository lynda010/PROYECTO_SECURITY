<?php

namespace App\Http\Controllers;

use App\Models\curso;
use App\Models\Modulo;
use App\Models\Modulo as ModelsModulo;
use App\Models\Tipo_Curso;
use Illuminate\Http\Request;

class moduloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modulos = Modulo::with('curso')->get();
        return view('modulos.index', compact('modulos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Trae todos los cursos disponibles
        $cursos = curso::all();

        // Envía ambas variables a la vista
        return view('modulos.create', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nombre_modulo' => 'required|string|max:255',
            'curso_id' => 'required',
        ]);


        Modulo::create($validated);


        return redirect()->route('modulos.index')
            ->with('success', 'Módulo registrado correctamente.');
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
        $modulo = Modulo::findOrFail($id);
        $cursos = Curso::all();

        return view('modulos.edit', compact('modulo', 'cursos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos
        $validated = $request->validate([
            'nombre_modulo' => 'required|string|max:255',
            'curso_id' => 'required',
        ]);

        // Buscar y actualizar el módulo
        $modulo = Modulo::findOrFail($id);

        $modulo->update($validated);

        // Redirigir con mensaje de éxito
        return redirect()->route('modulos.index')
            ->with('success', 'Módulo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $modulo = Modulo::findOrFail($id);
        


        if ($modulo->delete()) {
            return redirect()->route('modulos.index')
                ->with('success', 'Módulo eliminado exitosamente.');
        }

        return redirect()->route('modulos.index')
            ->with('error', 'No se pudo eliminar el módulo.');
    }
}
