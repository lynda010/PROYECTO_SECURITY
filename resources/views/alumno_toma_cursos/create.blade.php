@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Alumno en Curso</h1>

    <form action="{{ route('alumno_toma_cursos.store') }}" method="POST">
        @csrf


           <div class="mb-3">
            <label for="grupo_id" class="form-label">Grupo</label>
            <select name="grupo_id" id="grupo_id" class="form-control form-control form-control  @error('grupo_id') is-invalid @enderror" required>
                @error('grupo_id')
                <div class="nvalid-feedback">
                    {{ $message}}
                    @enderror
                </div>
                <option value="">Seleccione un alumno</option>
                @foreach ($grupos as $grupo)
                <option value="{{ $grupo->id }}">{{ $grupo->nombre_grupo }}</option>
                @endforeach
            </select>
        </div>



        <div class="mb-3">
            <label for="alumno_id" class="form-label">Alumno</label>
            <select name="alumno_id" id="alumno_id" class="form-control form-control form-control  @error('idAlumno') is-invalid @enderror" required>
                @error('alumno_id')
                <div class="nvalid-feedback">
                    {{ $message}}
                    @enderror
                </div>
                <option value="">Seleccione un alumno</option>
                @foreach ($alumnos as $alumno)
                <option value="{{ $alumno->id }}">{{ $alumno->nombres }} {{ $alumno->apellidos }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="curso_id" class="form-label">Curso</label>
            <select name="curso_id" id="curso_id" class="form-control form-control form-control  @error('idCurso') is-invalid @enderror" required>
                @error('Curso')
                <div class="nvalid-feedback">
                    {{ $message}}
                    @enderror
                </div>
                <option value="">Seleccione un curso</option>
                @foreach ($cursos as $curso)
                <option value="{{ $curso->id }}">{{ $curso->nombre_curso }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control form-control form-control  @error('idfecha_inicio') is-invalid @enderror" required>
            @error('Fecha de Inicio')
            <div class="nvalid-feedback">
                {{ $message}}
                @enderror
            </div>


            <!--
        <div class="mb-3">
            <label for="fecha_fin" class="form-label">Fecha de Finalización</label>
            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="calificacion" class="form-label">Calificación</label>
            <input type="number" name="calificacion" id="calificacion" step="0.01" min="0" max="10" class="form-control">
        </div>

        <div class="mb-3">
            <label for="aprobado" class="form-label">Aprobado</label>
            <select name="aprobado" id="aprobado" class="form-select" required>
                <option value="">Seleccione</option>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>-->

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('alumno_toma_cursos.index') }}" class="btn btn-secondary">Cancelar</a>

    </form>
</div>

@endsection