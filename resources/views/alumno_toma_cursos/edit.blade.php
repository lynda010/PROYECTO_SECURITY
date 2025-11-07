@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Registro de Alumno en Curso</h1>

    <form action="{{ route('alumno_toma_cursos.update', $registro->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="alumno_id" class="form-label">Alumno</label>
            <select name="alumno_id" id="alumno_id" class="form-select" required>
                @foreach ($alumnos as $alumno)
                    <option value="{{ $alumno->id }}" {{ $registro->alumno_id == $alumno->id ? 'selected' : '' }}>
                        {{ $alumno->nombres }} {{ $alumno->apellidos }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="curso_id" class="form-label">Curso</label>
            <select name="curso_id" id="curso_id" class="form-select" required>
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}" {{ $registro->curso_id == $curso->id ? 'selected' : '' }}>
                        {{ $curso->nombre_curso }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ $registro->fecha_inicio }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_fin" class="form-label">Fecha de Finalización</label>
            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ $registro->fecha_fin }}" required>
        </div>

        <div class="mb-3">
            <label for="calificacion" class="form-label">Calificación</label>
            <input type="number" name="calificacion" id="calificacion" step="0.01" min="0" max="10" class="form-control" value="{{ $registro->calificacion }}">
        </div>

        <div class="mb-3">
            <label for="aprobado" class="form-label">Aprobado</label>
            <select name="aprobado" id="aprobado" class="form-select" required>
                <option value="1" {{ $registro->aprobado ? 'selected' : '' }}>Sí</option>
                <option value="0" {{ !$registro->aprobado ? 'selected' : '' }}>No</option>
            </select>
        </div>

        <button type="submit" class="btn btn-dark px-4">💾 Actualizar</button>
        <a href="{{ route('alumno_toma_cursos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
