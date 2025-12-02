<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\alumno_completa_modulo;
use App\Models\alumno_toma_curso;
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



    public function createMasivo($idcurso, $idalumno)
    {
        // Traer el alumno. findOrFail lanza excepción si no existe.
        $alumno = Alumno::findOrFail($idalumno);

        // Convertir a colección para poder iterar en la vista, incluso si es un solo registro
        $alumnos = collect([$alumno]);

        // Traer los módulos del curso
        $modulos = Modulo::where('curso_id', $idcurso)->get();



        // Retornar la vista con los datos
        return view('alumno_completa_modulos.createMasivo', compact('alumnos', 'modulos'));
    }


        public function createMasivogrupo($idgrupo)
        {
            // Traer todos los registros de alumnos del grupo seleccionado con sus cursos
            $registros = alumno_toma_curso::with(['alumno', 'curso', 'grupo'])
                            ->where('grupo_id', $idgrupo)
                            ->get();

            // Obtener solo los alumnos como colección
            $alumnos = $registros->pluck('alumno')->unique('id');

            
            $cursos = $registros->pluck('curso')->unique('id');

            // 4. Obtener todos los módulos de esos cursos
            $modulos = Modulo::whereIn('curso_id', $cursos->pluck('id'))->get();


            // Pasar a la vista
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




    public static function asignarModulo($idAlumno, $idcurso)
    {
        
        $modulos = modulo::where('curso_id', $idcurso)->get();

        foreach ($modulos as $modulo) {
            alumno_completa_modulo::create([
                'fecha_finalizacion' => now(),
                'estado' => 'En curso',
                'alumno_id' => $idAlumno,
                'modulo_id' => $modulo->id,
            ]);
        }

    }


}