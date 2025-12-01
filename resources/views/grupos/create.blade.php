@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Nuevo Grupo</h1>

    <form action="{{ route('grupos.store') }}" method="POST">
        @csrf

        <div class="mb-3 w-50">
            <label for="nombre_grupo" class="form-label">Nombre del Grupo</label>
            <input type="text"
                name="nombre_grupo"
                id="nombre_grupo"
                class="form-control @error('nombre_grupo') is-invalid @enderror"
                required>
            @error('nombre_grupo')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3 w-50">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text"
                name="descripcion"
                id="descripcion"
                class="form-control @error('descripcion') is-invalid @enderror"
                required>
            @error('descripcion')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Registrar Grupo</button>
        <a href="{{ route('grupos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection