<?php

namespace App\Http\Controllers;

use App\Models\pago;
use Illuminate\Http\Request;

class pagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = pago::all();
        return view('pagos.index', compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pagos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_pago' => 'required|date',
            'monto' => 'required|numeric',
            'metodo_pago' => 'required|string|max:100',
            'estado_pago' => 'required|string|max:50',
            'alumno_id' => 'required|exists:alumno,id',
            'curso_id' => 'required|exists:curso,id',
        ]);

        pago::create($request->all());

        return redirect()->route('pagos.index')
            ->with('success', 'Pago creado exitosamente.');
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
        $pago = pago::find($id);
        return view('pagos.edit', compact('pago'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        pago::find($id)->update($request->validate());
        return redirect()->route('pagos.index')
            ->with('success', 'Pago actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        pago::find($id)->delete();
        return redirect()->route('pagos.index')
            ->with('success', 'Pago eliminado exitosamente.');
    }
}
