<?php

namespace App\Http\Controllers;

use App\Models\curso;
use App\Models\modulo;
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
    
        /*$data = $request->validate([
            'nombre_modulo' => 'required|string|max:100',
            'curso_id' => 'required|exists:cursos,id',
        ]);*/

        

    Modulo::create($request->all());

    return redirect()->route('modulos.index')->with('success', 'Módulo registrado correctamente.');
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
        $modulo = modulo::find($id);
        return view('modulos.edit', compact('modulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Modulo::find($id)->update($request->validate());
        return redirect()->route('modulos.index')
            ->with('success', 'Módulo actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {}
}
