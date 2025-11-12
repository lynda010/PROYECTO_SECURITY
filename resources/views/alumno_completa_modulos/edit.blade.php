@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Registro de Módulo Completado</h1>

    <form action="{{ route('alumno_completa_modulo.update', $alumno_completa_modulo->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="alumno_id" class="form-label">Alumno</label>
            <select name="alumno_id" id="alumno_id" class="form-select" required>
                @foreach ($alumnos as $alumno)
                    <option value="{{ $alumno->id }}" {{ $alumno_completa_modulo->alumno_id == $alumno->id ? 'selected' : '' }}>
                        {{ $alumno->nombres }} {{ $alumno->apellidos }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="modulo_id" class="form-label">Módulo</label>
            <select name="modulo_id" id="modulo_id" class="form-select" required>
                @foreach ($modulos as $modulo)
                    <option value="{{ $modulo->id }}" {{ $alumno_completa_modulo->modulo_id == $modulo->id ? 'selected' : '' }}>
                        {{ $modulo->nombre_modulo }} ({{ $modulo->curso->nombre_curso }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_finalizacion" class="form-label">Fecha de Finalización</label>
            <input type="date" name="fecha_finalizacion" id="fecha_finalizacion" class="form-control" value="{{ $alumno_completa_modulo->fecha_finalizacion }}" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-select" required>
                <option value="Aprobado" {{ $alumno_completa_modulo->estado == 'Aprobado' ? 'selected' : '' }}>Aprobado</option>
                <option value="Reprobado" {{ $alumno_completa_modulo->estado == 'Reprobado' ? 'selected' : '' }}>Reprobado</option>
                <option value="En curso" {{ $alumno_completa_modulo->estado == 'En curso' ? 'selected' : '' }}>En curso</option>
            </select>
        </div>

        <button type="submit" class="btn btn-dark px-4">💾 Actualizar</button>
        <a href="{{ route('alumno_completa_modulos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
