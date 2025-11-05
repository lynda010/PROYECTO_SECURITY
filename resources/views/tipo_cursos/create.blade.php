@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nuevo Tipo de Curso</h1>
    <form action="{{ route('tipo_cursos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nombre_tipo" class="form-label">Nombre del Tipo de Curso</label>
        <input type="text" name="nombre_tipo" id="nombre_tipo" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('tipo_cursos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>


    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">
        Volver
    </a>
</div>
@endsection
