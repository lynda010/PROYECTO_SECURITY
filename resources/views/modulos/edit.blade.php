@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Módulo</h1>

    <form action="{{ route('modulos.update', $modulo->id) }}" method="POST">
        @csrf
        @method('POST')

        <div class="mb-3">
            <label for="nombre_modulo" class="form-label">Nombre del Módulo</label>
            <input type="text" name="nombre_modulo" id="nombre_modulo" class="form-control" value="{{ $modulo->nombre_modulo }}" required>
        </div>

        <div class="mb-3 w-50">
            <label for="curso_id" class="form-label">Curso Asociado</label>
            <select
                name="curso_id"
                id="curso_id"
                class="form-control @error('curso_id') is-invalid @enderror"
                required>

                <option value="">Seleccione...</option>

                @foreach ($cursos as $curso)
                <option value="{{ $curso->id }}"
                    {{ old('curso_id', $modulo->curso_id ?? '') == $curso->id ? 'selected' : '' }}>
                    {{ $curso->nombre_curso ?? 'Curso sin nombre' }}
                </option>
                @endforeach

            </select>
        </div>


        <button type="submit" class="btn btn-dark px-4">💾 Actualizar</button>
        <a href="{{ route('modulos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection