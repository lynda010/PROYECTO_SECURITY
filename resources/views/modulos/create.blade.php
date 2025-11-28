@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Nuevo Módulo</h1>

    <form action="{{ route('modulos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre_modulo" class="form-label">Nombre del Módulo</label>
            <input type="text" name="nombre_modulo" id="nombre_modulo" class="form-control @error('idfecha_pago') is-invalid @enderror" required>
            @error('nombre_modulo')
            <div class="invalid-feedback">
                {{ $message }}
                @enderror
            </div>


            <div class="mb-3">
                <label for="modulo_id" class="form-label">Curso y Módulo</label>
                <select name="curso_id" id="curso_id" class="form-control   @error('idcurso_modulo') is-invalid @enderror">
                    @error('curso_modulo')
                    <div class="invalid-feedback">
                        {{ $message }}
                        @enderror
                    </div>

                    @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nombre_curso }} </option>
                    @endforeach


                </select>
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('modulos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

@endsection