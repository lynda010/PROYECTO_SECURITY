@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Finalización de Módulo por Alumno</h1>

    <form action="{{ route('alumno_completa_modulos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="alumno_id" class="form-label">Alumno</label>
            <select name="alumno_id" id="alumno_id" class="form-control   @error('idAlumno') is-invalid @enderror" required>
                @error('alumno_id')
                <div class="nvalid-feedback">
                    {{ $message}}
                    @enderror
                </div>
                <option value="">Seleccione un alumno</option>

                @isset($alumnos)
                @forelse($alumnos as $alumno)
                <option value="{{ $alumno->id }}">
                    {{ $alumno->nombres }} {{ $alumno->apellidos }}
                </option>
                @empty
                <option value="">No hay alumnos registrados</option>
                @endforelse
                @else
                <option value="">Error: no se cargaron los alumnos</option>
                @endisset
            </select>

        </div>

        <div class="mb-3">
            <label for="modulo_id" class="form-label">Módulo</label>
            <select name="modulo_id" id="modulo_id" class="form-control  @error('idMódulo') is-invalid @enderror" required>
                @error('modulo_id')
                <div class="nvalid-feedback">
                    {{ $message}}
                    @enderror
                </div>
                <option value="">Seleccione un módulo</option>
                @foreach ($modulos as $modulo)
                <option value="{{ $modulo->id }}"> {{ $modulo->curso->nombre_curso }} -- {{ $modulo->nombre_modulo }} </option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="fecha_finalizacion" class="form-label">Fecha de Finalización</label>
            <input type="date" name="fecha_finalizacion" id="fecha_finalizacion" class="form-control   @error('idMódulo') is-invalid @enderror" required>
            @error('fecha_finalizacion')
            <div class="nvalid-feedback">
                {{ $message}}
                @enderror
                </div>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-control  @error('idestado') is-invalid @enderror" required>
                @error('estado')
            <div class="nvalid-feedback">
                {{ $message}}
                @enderror
                </div>

                <option value="">Seleccione estado</option>
                <option value="Aprobado">Aprobado</option>
                <option value="Reprobado">Reprobado</option>
                <option value="En curso">En curso</option>
            </select>
        </div>


        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('alumno_completa_modulos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">
        Volver
    </a>
</div>
@endsection