@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Tipo de Curso</h1>
    <form action="{{ route('tipo_cursos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre_tipo" class="form-label">Nombre del Tipo de Curso</label>
            <input type="text" class="form-control @error('idnombre_tipo') is-invalid @enderror" id="nombre_tipo" name="nombre_tipo" required>
            @error('nombre_tipo')
            <div class="invalid-feedback">
                {{ $message }}
                @enderror
            </div>


            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('tipo_cursos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>


</div>
@endsection