@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Grupo</h1>

    <form action="{{ route('grupos.update', $grupo->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nombre_grupo" class="form-label">Nombre del Grupo</label>
        <input type="text"
            name="nombre_grupo"
            id="nombre_grupo"
            class="form-control"
            value="{{ $grupo->nombre_grupo }}"
            required>
    </div>

    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <input type="text"
            name="descripcion"
            id="descripcion"
            class="form-control"
            value="{{ $grupo->descripcion }}"
            required>
    </div>

    <button type="submit" class="btn btn-dark px-4">💾 Actualizar</button>
    <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
</div>
@endsection