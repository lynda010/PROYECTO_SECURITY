<?php

namespace App\Http\Controllers;

use App\Models\curso;
use App\Models\Tipo_Curso;
use Illuminate\Http\Request;

class cursoController extends Controller
{
    /**
     * Muestra la lista de cursos
     */
    public function index()
    {
        $cursos = curso::with('tipoCurso')->get(); // para mostrar tipo de curso fácilmente
        return view('cursos.index', compact('cursos'));
    }

    /**
     * Muestra el formulario de creación
     */
    public function create()
    {
        $tiposCurso = Tipo_Curso::all(); // ✅ Corregido
        return view('cursos.create', compact('tiposCurso'));
    }

    /**
     * Guarda un nuevo curso en la base de datos
     */
    public function store(Request $request)
{

    
     // Validar los datos
    $request->validate([
        'nombre_curso' => 'required|string|max:100',
        'valor' =>         'required|numeric',
        'duracion_horas' => 'required|integer',
        'duracion_dias_presencial' => 'required|integer',
    ]);



    // Guardar en la base de datos
    curso::create($request->all());

    // Redirigir con mensaje de éxito
    return redirect()->route('cursos.index')
        ->with('success', 'Curso creado exitosamente.');
}

    /**
     * Muestra el formulario de edición
     */
    public function edit(string $id)
    {
        $curso = curso::findOrFail($id);
        $tiposCurso = Tipo_Curso::all();
        return view('cursos.edit', compact('curso', 'tiposCurso'));
    }

    /**
     * Actualiza un curso existente
     */
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

    /**
     * Elimina un curso
     */
    public function destroy(string $id)
    {
        $curso = curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('cursos.index')
            ->with('success', 'Curso eliminado correctamente.');
    }
}
