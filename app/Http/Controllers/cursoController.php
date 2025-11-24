<?php

namespace App\Http\Controllers;

use App\Models\curso;
use App\Models\Tipo_Curso;
use Illuminate\Http\Request;

class cursoController extends Controller
{

    public function index()
    {
        $cursos = curso::with('tipoCurso')->get();
        return view('cursos.index', compact('cursos'));
    }


    public function create()
    {
        $tiposCurso = Tipo_Curso::all(); // ✅ Corregido
        return view('cursos.create', compact('tiposCurso'));
    }


    public function store(Request $request)
    {



        $request->validate([
            'nombre_curso' => 'required|string|max:100',
            'valor' =>         'required|numeric',
            'duracion_horas' => 'required|integer',
            'duracion_dias_presencial' => 'required|integer',
        ]);




        curso::create($request->all());


        return redirect()->route('cursos.index')
            ->with('success', 'Curso creado exitosamente.');
    }


    public function edit(string $id)
    {
        $curso = curso::findOrFail($id);
        $tiposCurso = Tipo_Curso::all();
        return view('cursos.edit', compact('curso', 'tiposCurso'));
    }


    public function update(Request $request, string $id)
    {
        $curso = curso::findOrFail($id);

        $data = $request->validate([
            'nombre_curso' => 'required|string|max:100',
            'valor' => 'required|numeric',
            'duracion_horas' => 'required|integer',
            'duracion_dias_presencial' => 'required|integer',
            'tipo_curso_id' => 'required|exists:tipo_curso,id',
        ]);

        $curso->update($data);

        return redirect()->route('cursos.index')
            ->with('success', 'Curso actualizado exitosamente.');
    }

    
    public function destroy($id)
    {
        $curso = Curso::findOrFail($id);

        if ($curso->modulos()->count() > 0) {
            return back()->with('error', 'No se puede eliminar este Curso porque tiene módulos asociados.');
        }

        $curso->delete();

        return back()->with('success', 'Curso eliminado correctamente.');
    }
}
