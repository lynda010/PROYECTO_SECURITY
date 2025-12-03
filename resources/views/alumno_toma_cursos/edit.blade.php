@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Registro de Alumno en Curso</h1>

    <form action="{{ route('alumno_toma_cursos.update', $registro->id) }}" method="POST">
        @csrf

        <style>
            /* Estilo para selects con línea inferior */
            select.underline-select {
                border: none;
                border-bottom: 2px solid #ced4da;
                border-radius: 0;
                padding: 4px 0;
                background: transparent;
                font-size: 1rem;
                outline: none;
                width: 100%;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
            }

            select.underline-select:focus {
                border-bottom-color: #495057;
                box-shadow: none;
            }
        </style>

        <div class="mb-3 w-50">
            <label for="alumno_id" class="form-label">Alumno</label>
            <select
                name="alumno_id"
                id="alumno_id"
                class="form-control @error('alumno_id') is-invalid @enderror"
                required>
                <option value="">Seleccione...</option>
                @foreach ($alumnos as $alumno)
                <option value="{{ $alumno->id }}" {{ old('alumno_id', $registro->alumno_id ?? '') == $alumno->id ? 'selected' : '' }}>
                    {{ $alumno->nombres }} {{ $alumno->apellidos }}
                </option>
                @endforeach
            </select>
            @error('alumno_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3 w-50">
            <label for="curso_id" class="form-label">Curso</label>
            <select
                name="curso_id"
                id="curso_id"
                class="form-control @error('curso_id') is-invalid @enderror"
                required>
                <option value="">Seleccione...</option>
                @foreach ($cursos as $curso)
                <option value="{{ $curso->id }}" {{ old('curso_id', $registro->curso_id ?? '') == $curso->id ? 'selected' : '' }}>
                    {{ $curso->nombre_curso }}
                </option>
                @endforeach
            </select>
            @error('curso_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3 w-50">
            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ $registro->fecha_inicio }}" required>
        </div>

        <div class="mb-3 w-50">
            <label for="fecha_fin" class="form-label">Fecha de Finalización</label>
            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ $registro->fecha_fin }}" required>
        </div>

        <div class="mb-3 w-50">
            <label for="calificacion" class="form-label">Calificación</label>
            <input type="number" name="calificacion" id="calificacion" step="0.01" min="0" max="10" class="form-control" value="{{ $registro->calificacion }}">
        </div>

        <div class="mb-3 w-50">
    <label for="aprobado" class="form-label">Aprobado</label>
    <select
        name="aprobado"
        id="aprobado"
        class="form-control @error('aprobado') is-invalid @enderror"
        required>
        <option value="">Seleccione...</option>
        <option value="1" {{ old('aprobado', $registro->aprobado ?? '') == 1 ? 'selected' : '' }}>Sí</option>
        <option value="0" {{ old('aprobado', $registro->aprobado ?? '') == 0 ? 'selected' : '' }}>No</option>
    </select>
    @error('aprobado')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>


        <button type="submit" class="btn btn-dark px-4">💾 Actualizar</button>
        <a href="{{ route('alumno_toma_cursos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection