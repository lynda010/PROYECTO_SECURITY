<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use Illuminate\Http\Request;

class alumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumnos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_documento' => 'required|string|max:20',
            'numero_documento' => 'required|string|max:50|unique:alumno,numero_documento',
            'nombres' => 'required|string|max:20',
            'apellidos' => 'required|string|max:50',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string|max:20',
            'eps' => 'required|string|max:150',
            'correo_electronico' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:255',
            'usuario_plataforma' => 'required|string|max:50',
            'contrasena_plataforma' => 'required|string|max:50',
            'situacion_militar_definida' => 'required|boolean',

        ]);

        alumno::create($request->all());

        return redirect()->route('alumnos.index')
                        ->with('success', 'Alumno creado exitosamente.');
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
        $alumno = alumno::find($id);
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        alumno::find($id)->update($request->validate());
        return redirect()->route('alumnos.index')
                        ->with('success', 'Alumno actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alumno = alumno::find($id);
        $alumno->delete();
        return redirect()->route('alumnos.index')
                        ->with('success', 'Alumno eliminado exitosamente.');
    }
}
