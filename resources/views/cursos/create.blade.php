@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Nuevo Curso</h1>

    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf

        {{-- Nombre del Curso --}}
        <div class="mb-3 w-50">
            <label for="nombre_curso" class="form-label">Nombre del Curso</label>
            <input
                type="text"
                name="nombre_curso"
                id="nombre_curso"
                class="form-control @error('nombre_curso') is-invalid @enderror"
                required>
            @error('nombre_curso')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Valor --}}
        <div class="mb-3 w-50">
            <label for="valor" class="form-label">Valor ($)</label>
            <input
                type="number"
                name="valor"
                id="valor"
                class="form-control @error('valor') is-invalid @enderror"
                step="0.01"
                required>
            @error('valor')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Duración horas --}}
        <div class="mb-3 w-50">
            <label for="duracion_horas" class="form-label">Duración (horas)</label>
            <input
                type="number"
                name="duracion_horas"
                id="duracion_horas"
                class="form-control @error('duracion_horas') is-invalid @enderror"
                required>
            @error('duracion_horas')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Duración días presenciales --}}
        <div class="mb-3 w-50">
            <label for="duracion_dias_presencial" class="form-label">Duración (días presenciales)</label>
            <input
                type="number"
                name="duracion_dias_presencial"
                id="duracion_dias_presencial"
                class="form-control @error('duracion_dias_presencial') is-invalid @enderror"
                required>
            @error('duracion_dias_presencial')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Tipo curso --}}
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

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>


</div>
@endsection