<?php

namespace App\Http\Controllers;

use App\Models\curso;
use App\Models\Modulo;
use App\Models\Modulo as ModelsModulo;
use App\Models\Tipo_Curso;
use Illuminate\Http\Request;

class moduloController extends Controller
{

    public function index()
    {
        $modulos = Modulo::with('curso')->get();
        return view('modulos.index', compact('modulos'));
    }



    public function create()
    {

        $cursos = curso::all();


        return view('modulos.create', compact('cursos'));
    }


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



    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $modulo = Modulo::findOrFail($id);
        $cursos = Curso::all();

        return view('modulos.edit', compact('modulo', 'cursos'));
    }


    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'nombre_modulo' => 'required|string|max:255',
            'curso_id' => 'required',
        ]);


        $modulo = Modulo::findOrFail($id);

        $modulo->update($validated);


        return redirect()->route('modulos.index')
            ->with('success', 'Módulo actualizado exitosamente.');
    }


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
