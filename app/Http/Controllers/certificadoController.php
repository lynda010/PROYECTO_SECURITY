<?php

namespace App\Http\Controllers;

use App\Models\certificado;
use Illuminate\Http\Request;

class certificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificados = certificado::all();
        return view('certificado.index', compact('certificados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('certificado.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'codigo_interno' => 'required|string|max:50|unique:certificado',
            'codigo_qr' => 'required|string|max:50',
            'fecha_emision' => 'required|date',
            'fecha_vencimiento' => 'required|date',
            'resgistro_supervigilancia' => 'required|string|max:100',
            'alumno_id' => 'required|exists:alumno,id',
        ]);
        Certificado::create($request->all());

        return redirect()->route('certificados.index')
            ->with('success', 'Certificado creado exitosamente.');
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
        $certificado = Certificado::find($id);
        return view('certificados.edit', compact('certificado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Certificado::find($id)->update($request->validate());
        return redirect()->route('certificados.index')
                        ->with('success', 'Certificado actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Certificado::find($id)->delete();
        return redirect()->route('certificados.index')
                        ->with('success', 'Certificado eliminado exitosamente.');
    }
}
