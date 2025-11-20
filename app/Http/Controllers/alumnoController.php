<?php

namespace App\Http\Controllers;

use App\Models\alumno;
use App\Models\Curso;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $alumnos = alumno::all();
        return view('alumnos.create', compact('alumnos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'tipo_documento' => 'required|string|max:50',
            'numero_documento' => 'required|string|max:50',
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string|max:20',
            'eps' => 'required|string|max:100',
            'correo_electronico' => 'required|email|max:150',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:150',
            'usuario_plataforma' => 'required|string|max:50',
            'contrasena_plataforma' => 'required|string|max:100',
            'situacion_militar_definida' => 'required|boolean',
        ]);

        alumno::create($request->all());

        return redirect()->route('alumnos.index')
            ->with('success', 'Alumno creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $alumno = Alumno::findOrFail($id);

        // Cargar cursos + datos del pivote + módulos del curso
        $cursos = $alumno->cursos()
            ->with('modulos')
            ->get();
            dd($cursos);


        return view('alumnos.detalle', compact('alumno', 'cursos'));
    }




    public function edit(string $id)
    {
        $alumno = alumno::findorFail($id);
        return view('alumnos.edit', compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // ✅ Primero validamos los datos correctamente
        $validated = $request->validate([
            'tipo_documento' => 'required|string|max:50',
            'numero_documento' => 'required|string|max:50',
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string|max:20',
            'eps' => 'required|string|max:100',
            'correo_electronico' => 'required|email|max:150',
            'telefono' => 'required|string|max:20',
            'direccion' => 'required|string|max:150',
            'usuario_plataforma' => 'required|string|max:50',
            'contrasena_plataforma' => 'required|string|max:100',
            'situacion_militar_definida' => 'required|boolean',
        ]);

        // ✅ Luego actualizamos el registro
        Alumno::findOrFail($id)->update($validated);

        // ✅ Finalmente redirigimos con mensaje de éxito
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

    public function generarPDF()
    {
        $alumnos = Alumno::all();

        $pdf = Pdf::loadView('pdf.alumnopdf', compact('alumnos'));
        return $pdf->stream('reporte_alumnos.pdf');
    }
    public function verpdfalumnos()
    {
        $alumnos = Alumno::all();

        $pdf = Pdf::loadView('pdf.alumnopdf', compact('alumnos'));
        return $pdf->stream('reporte_alumnos.pdf');
    }

    public function detalle($id)
    {
        // Buscar alumno (lanza 404 si no existe)
        $alumno = Alumno::findOrFail($id);

        // Cargar cursos y módulos con la información del pivot
        // Esto usa la relación belongsToMany definida en Alumno
        // y se asegura de traer los modulos de cada curso.
        $alumno->load(['cursos.modulos']);

        // Obtener la colección de cursos (ya trae pivot)
        $cursos = $alumno->cursos;

        return view('alumnos.detalle', compact('alumno', 'cursos'));
    }
}
