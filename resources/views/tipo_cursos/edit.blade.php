@extends('layouts.app')

@section('title')
Editar Tipo de Curso
@endsection

@section('titlecontent')
<h1>Editar Tipo de Curso</h1>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <a href="{{ route('tipo_cursos.create') }}" class="btn btn-info mb-3">Crear Tipo de Curso</a>

            <form action="{{ route('tipo_cursos.update', $tipo_curso->id) }}" method="POST">
                @csrf
                @method('POST') {{-- Tu sistema usa POST para update --}}

                <div class="mb-3">
                    <label for="nombre_tipo" class="form-label">Nombre del Tipo de Curso:</label>
                    <input 
                        type="text" 
                        id="nombre_tipo" 
                        name="nombre_tipo"  {{-- 🔹 Campo corregido --}}
                        class="form-control" 
                        value="{{ $tipo_curso->nombre_tipo }}" 
                        required
                    >
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-dark px-4">💾 Actualizar</button>
                </div>
            </form>
        </div>
    </div>

    {{-- 🔹 Botón Volver --}}
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">
        Volver
    </a>
</div>
@endsection
