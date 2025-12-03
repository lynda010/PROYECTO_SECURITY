@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Curso</h1>

    <form action="{{ route('cursos.update', $curso->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre_curso" class="form-label">Nombre del Curso</label>
            <input type="text" name="nombre_curso" id="nombre_curso" class="form-control" value="{{ $curso->nombre_curso }}" required>
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor ($)</label>
            <input type="number" name="valor" id="valor" class="form-control" step="0.01" value="{{ $curso->valor }}" required>
        </div>

        <div class="mb-3">
            <label for="duracion_horas" class="form-label">Duración (horas)</label>
            <input type="number" name="duracion_horas" id="duracion_horas" class="form-control" value="{{ $curso->duracion_horas }}" required>
        </div>

        <div class="mb-3">
            <label for="duracion_dias_presencial" class="form-label">Duración (días presenciales)</label>
            <input type="number" name="duracion_dias_presencial" id="duracion_dias_presencial" class="form-control" value="{{ $curso->duracion_dias_presencial }}" required>
        </div>


        <div class="mb-3 w-50">
            <label for="tipo_curso_id" class="form-label">Tipo de Curso</label>
            <select
                name="tipo_curso_id"
                id="tipo_curso_id"
                class="form-control @error('tipo_curso_id') is-invalid @enderror"
                required>
                <option value="">Seleccione...</option>
                @foreach($tiposCurso as $item)
                <option value="{{ $item->id }}">{{ $item->nombre_tipo }}</option>
                @endforeach
            </select>

            @error('tipo_curso_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <button type="submit" class="btn btn-dark px-4">💾 Actualizar</button>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection