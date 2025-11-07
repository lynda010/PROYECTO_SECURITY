@extends('layouts.app')

@section('Content')
<div class="container">
    <h1>Registrar Nuevo Alumno</h1>

    <form action="{{ route('alumnos.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="tipo_documento">Tipo de Documento</label>
                <input type="text" name="tipo_documento" id="tipo_documento" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="numero_documento">Número de Documento</label>
                <input type="text" name="numero_documento" id="numero_documento" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="nombres">Nombres</label>
                <input type="text" name="nombres" id="nombres" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="genero">Género</label>
                <input type="text" name="genero" id="genero" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="eps">EPS</label>
                <input type="text" name="eps" id="eps" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="correo_electronico">Correo Electrónico</label>
                <input type="email" name="correo_electronico" id="correo_electronico" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="telefono">Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="usuario_plataforma">Usuario de Plataforma</label>
                <input type="text" name="usuario_plataforma" id="usuario_plataforma" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="contrasena_plataforma">Contraseña de Plataforma</label>
                <input type="password" name="contrasena_plataforma" id="contrasena_plataforma" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="situacion_militar_definida">Situación Militar Definida</label>
                <select name="situacion_militar_definida" id="situacion_militar_definida" class="form-select" required>
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">
        Volver
    </a>
</div>
@endsection
