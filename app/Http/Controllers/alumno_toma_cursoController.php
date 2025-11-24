<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\alumno_completa_modulo;
use App\Models\alumno_toma_curso;
use App\Models\Curso;
use App\Models\Modulo;
use Illuminate\Http\Request;
use SebastianBergmann\Type\TrueType;

class alumno_toma_cursoController extends Controller
{

    public function index()
    {
        $registros = alumno_toma_curso::all();
        return view('alumno_toma_cursos.index', compact('registros'));
    }


    public function create()
    {
        $alumnos = Alumno::all();
        $cursos = Curso::all();

        return view('alumno_toma_cursos.create', compact('alumnos', 'cursos'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'fecha_inicio' => 'required|date',
            'alumno_id' => 'required|integer',
            'curso_id' => 'required|integer',
        ]);

        $validated['fecha_fin'] = now();
        $validated['calificacion'] = 0;
        $validated['aprobado'] = 0;


        alumno_toma_curso::create($validated);

        return redirect()->route('alumno_toma_cursos.index')
            ->with('success', 'El registro del alumno en el curso se creó exitosamente.');
    }



    public function show(string $id) {}


    public function edit($id)
    {

        $registro = \App\Models\Alumno_Toma_Curso::findOrFail($id);


        $alumnos = \App\Models\Alumno::all();
        $cursos = \App\Models\Curso::all();


        return view('alumno_toma_cursos.edit', compact('registro', 'alumnos', 'cursos'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'alumno_id' => 'required',
            'curso_id' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'calificacion' => 'nullable|numeric|min:0|max:10',
            'aprobado' => 'required|boolean',
        ]);

        $registro = \App\Models\Alumno_Toma_Curso::findOrFail($id);
        $registro->update($validated);

        return redirect()->route('alumno_toma_cursos.index')
            ->with('success', 'Registro actualizado correctamente');
    }



    public function destroy(string $id)
    {
        alumno_toma_curso::find($id)->delete();
        return redirect()->route('alumno_toma_cursos.index')
            ->with('success', 'Registro eliminado exitosamente.');
    }

    public function createMasivo()
    {
        $alumnos = Alumno::all();
        $cursos = Curso::all();

        return view('alumno_toma_cursos.createmasivo', compact('alumnos', 'cursos'));
    }


    public function storeMasivo(Request $request)
    {
        $validated = $request->validate([
            'fecha_inicio' => 'required|date',
            'curso_id' => 'required|integer',
            'alumno_ids' => 'required|array',
            'alumno_ids.*' => 'integer'
        ]);

        foreach ($validated['alumno_ids'] as $alumno_id) {
            alumno_toma_curso::create([
                'alumno_id' => $alumno_id,
                'curso_id' => $validated['curso_id'],
                'fecha_inicio' => $validated['fecha_inicio'],
                'fecha_fin' => now(),
                'calificacion' => 0,
                'aprobado' => 0,
            ]);
        }

        return redirect()->route('alumno_toma_cursos.index')
            ->with('success', 'Registros masivos creados exitosamente.');
    }


    public static function calificarCurso($idAlumno, $cursoId)
    {

        $totalModulosCurso = Modulo::where('curso_id', $cursoId)->count();


        $modulosAprobados = alumno_completa_modulo::where('alumno_id', $idAlumno)
            ->where('estado', 'Aprobado')
            ->whereHas('modulo', function ($query) use ($cursoId) {
                $query->where('curso_id', $cursoId);
            })
            ->count();


        if ($modulosAprobados == $totalModulosCurso) {

            $cursoAlumno = alumno_toma_curso::where('alumno_id', $idAlumno)
                ->where('curso_id', $cursoId)
                ->first();

            if ($cursoAlumno) {
                $cursoAlumno->calificacion = 10;
                $cursoAlumno->aprobado = true;
                $cursoAlumno->fecha_fin = now();
                $cursoAlumno->save();
            }
        }
    }
}
