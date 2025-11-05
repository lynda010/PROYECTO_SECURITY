@extends('layouts.app')

@section('Content')
<div class="container">
    <h1>Editar Alumno</h1>

    <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Tipo de Documento</label>
                <input type="text" name="tipo_documento" value="{{ $alumno->tipo_documento }}" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Número de Documento</label>
                <input type="text" name="numero_documento" value="{{ $alumno->numero_documento }}" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Nombres</label>
                <input type="text" name="nombres" value="{{ $alumno->nombres }}" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Apellidos</label>
                <input type="text" name="apellidos" value="{{ $alumno->apellidos }}" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" value="{{ $alumno->fecha_nacimiento }}" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Género</label>
                <input type="text" name="genero" value="{{ $alumno->genero }}" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>EPS</label>
                <input type="text" name="eps" value="{{ $alumno->eps }}" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Correo Electrónico</label>
                <input type="email" name="correo_electronico" value="{{ $alumno->correo_electronico }}" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Teléfono</label>
                <input type="text" name="telefono" value="{{ $alumno->telefono }}" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Dirección</label>
                <input type="text" name="direccion" value="{{ $alumno->direccion }}" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Usuario de Plataforma</label>
                <input type="text" name="usuario_plataforma" value="{{ $alumno->usuario_plataforma }}" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Contraseña de Plataforma</label>
                <input type="password" name="contrasena_plataforma" value="{{ $alumno->contrasena_plataforma }}" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Situación Militar Definida</label>
                <select name="situacion_militar_definida" class="form-select" required>
                    <option value="1" {{ $alumno->situacion_militar_definida ? 'selected' : '' }}>Sí</option>
                    <option value="0" {{ !$alumno->situacion_militar_definida ? 'selected' : '' }}>No</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-dark px-4">💾 Actualizar</button>
        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
