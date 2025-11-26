@extends('layouts.app')

@section('Content')
<div class="container">
    <h1>Registrar Nuevo Alumno</h1>

    <form action="{{ route('alumnos.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="tipo_documento">Tipo de Documento</label>
                <input type="text" name="tipo_documento" id="tipo_documento" class="form-control  @error('idtipo_documento') is-invalid @enderror" required>
                @error('tipo_documento')
                <div class="nvalid-feedback">
                    {{ $message}}
                    @enderror
                </div>


                <div class="col-md-6 mb-3">
                    <label for="numero_documento">Número de Documento</label>
                    <input type="text" name="numero_documento" id="numero_documento" class="form-control  @error('idnumero_documento') is-invalid @enderror" required>
                    @error('numero_documento')
                    <div class="nvalid-feedback">
                        {{ $message}}
                        @enderror
                    </div>


                    <div class="col-md-6 mb-3">
                        <label for="nombres">Nombres</label>
                        <input type="text" name="nombres" id="nombres" class="form-control l  @error('idnombres') is-invalid @enderror " required>
                        @error('nombres')
                        <div class="nvalid-feedback">
                            {{ $message}}
                            @enderror
                        </div>


                        <div class="col-md-6 mb-3">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control  @error('idapellidos') is-invalid @enderror" required>
                            @error('apellidos')
                            <div class="nvalid-feedback">
                                {{ $message}}
                                @enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control   @error('idfecha_nacimiento') is-invalid @enderror" required>
                                @error('fecha_nacimiento')
                                <div class="nvalid-feedback">
                                    {{ $message}}
                                    @enderror
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label for="genero">Género</label>
                                    <input type="text" name="genero" id="genero" class="form-control   @error('idgenero') is-invalid @enderror" required>
                                    @error('genero')
                                    <div class="nvalid-feedback">
                                        {{ $message}}
                                        @enderror
                                    </div>


                                    <div class="col-md-6 mb-3">
                                        <label for="eps">EPS</label>
                                        <input type="text" name="eps" id="eps" class="form-control   @error('ideps') is-invalid @enderror" required>
                                        @error('eps')
                                        <div class="nvalid-feedback">
                                            {{ $message}}
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="correo_electronico">Correo Electrónico</label>
                                            <input type="email" name="correo_electronico" id="correo_electronico" class="form-control   @error('idcorreo_electronico') is-invalid @enderror" required>
                                            @error('correo_electronico')
                                            <div class="nvalid-feedback">
                                                {{ $message}}
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="telefono">Teléfono</label>
                                                <input type="text" name="telefono" id="telefono" class="form-control   @error('idtelefono') is-invalid @enderror" required>
                                                @error('telefono')
                                                <div class="nvalid-feedback">
                                                    {{ $message}}
                                                    @enderror
                                                </div>


                                                <div class="col-md-6 mb-3">
                                                    <label for="direccion">Dirección</label>
                                                    <input type="text" name="direccion" id="direccion" class="form-control   @error('iddireccion') is-invalid @enderror" required>
                                                    @error('direccion')
                                                    <div class="nvalid-feedback">
                                                        {{ $message}}
                                                        @enderror
                                                    </div>


                                                    <div class="col-md-6 mb-3">
                                                        <label for="usuario_plataforma">Usuario de Plataforma</label>
                                                        <input type="text" name="usuario_plataforma" id="usuario_plataforma" class="form-control  @error('idusuario_plataforma') is-invalid @enderror" required>
                                                        @error('usuario_plataforma')
                                                        <div class="nvalid-feedback">
                                                            {{ $message}}
                                                            @enderror
                                                        </div>

                                                        <div class="col-md-6 mb-3">
                                                            <label for="contrasena_plataforma">Contraseña de Plataforma</label>
                                                            <input type="password" name="contrasena_plataforma" id="contrasena_plataforma" class="form-control    @error('idcontrasena_plataforma') is-invalid @enderror" required>
                                                            @error('contrasena_plataforma')
                                                            <div class="nvalid-feedback">
                                                                {{ $message}}
                                                                @enderror
                                                            </div>


                                                            <div class="col-md-6 mb-3">
                                                                <label for="situacion_militar_definida">Situación Militar Definida</label>
                                                                <select name="situacion_militar_definida" id="situacion_militar_definida" class="form-control  @error('idsituacion_militar_definida') is-invalid @enderror" required>
                                                                    @error('situacion_militar_definida')
                                                                    <div class="nvalid-feedback">
                                                                        {{ $message}}
                                                                        @enderror
                                                                    </div>
                                                                    <option value="1">Sí</option>
                                                                    <option value="0">No</option>
                                                                </select>
                                                            </div>
                                                        </div>





                                                        <button type="submit" class="btn btn-success">Guardar</button>
                                                        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>


    </form>


</div>


@endsection