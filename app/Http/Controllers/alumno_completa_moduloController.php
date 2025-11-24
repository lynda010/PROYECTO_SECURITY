<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\alumno_completa_modulo;
use App\Models\modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\error;

class alumno_completa_moduloController extends Controller
{
    
    public function index()
{

    $alumno_completa_modulos = \App\Models\alumno_completa_modulo::with([
        'alumno',
        'modulo.curso',    
        
    ])->get();

    return view('alumno_completa_modulos.index', compact('alumno_completa_modulos'));
}

    
    public function create()
    {
        $alumnos = Alumno::all();
        $modulos = modulo::with('curso')->get();

        return view('alumno_completa_modulos.create', compact('alumnos', 'modulos'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'fecha_finalizacion' => 'required|date',
            'estado' => 'required|string|max:50',
            'alumno_id' => 'required',
            'modulo_id' => 'required',
        ]);

    
        $modulo = Modulo::find($request->modulo_id);
        $cursoId = $modulo->curso_id;

        alumno_completa_modulo::create($request->all());

        alumno_toma_cursoController::calificarCurso($request->alumno_id, $cursoId );


        return redirect()->route('alumno_completa_modulos.index')
            ->with('success', 'Registro creado exitosamente.');
    }


    
    public function show(string $id)
    {
        //
    }

    
    public function edit($id)
    {

        $alumnos = Alumno::all();
        $modulos = modulo::with('curso')->get();
        $alumno_completa_modulo = alumno_completa_modulo::findorfail($id);
        return view('alumno_completa_modulos.edit', compact('alumno_completa_modulo','alumnos','modulos'));
    }

    
    public function update(Request $request, $id)
    {

        $alumno_completa_modulo = alumno_completa_modulo::findorfail($id);
        $alumno_completa_modulo->update($request->all());

        return redirect()->route('alumno_completa_modulos.index')
            ->with('success', 'Registro actualizado exitosamente.');
    }

    
    public function destroy($id)
    {

        
        $alumno_completa_modulo = alumno_completa_modulo::findorfail($id);
        $alumno_completa_modulo->delete();

        return redirect()->route('alumno_completa_modulos.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }



    public function createMasivo()
    {
        $alumnos = Alumno::all();
        $modulos = modulo::with('curso')->get();

        return view('alumno_completa_modulos.createMasivo', compact('alumnos', 'modulos'));
    }


    public function storeMasivo(Request $request)
{
    $request->validate([
        'fecha_finalizacion' => 'required|date',
        'estado' => 'required|string|max:50',

        
        'alumno_ids' => 'required|array',
        'alumno_ids.*' => 'exists:alumno,id',

        
        'modulo_ids' => 'required|array',
        'modulo_ids.*' => 'exists:modulos,id',
    ]);

    
    foreach ($request->alumno_ids as $alumno_id) {
        foreach ($request->modulo_ids as $modulo_id) {
            alumno_completa_modulo::create([
                'fecha_finalizacion' => $request->fecha_finalizacion,
                'estado' => $request->estado,
                'alumno_id' => $alumno_id,
                'modulo_id' => $modulo_id,
            ]);
            
            
        alumno_toma_cursoController::calificarCurso($alumno_id, modulo::find($modulo_id)->curso_id );


        }
    }

    return redirect()->route('alumno_completa_modulos.index')
        ->with('success', 'Registros masivos creados exitosamente.');
}





}
