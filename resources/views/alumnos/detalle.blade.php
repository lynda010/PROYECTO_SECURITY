@extends('adminlte::page')

@section('title', 'Detalle del Alumno')

@section('content_header')
<div class="row">
    <div class="col-3">
        <a href="{{ route('alumnos.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>
    <div class="col-6 text-center">
        <h1 class="display-6">Detalle del Alumno</h1>
    </div>
</div>
@endsection

@section('content')

<div class="card">
    <div class="card-header bg-primary text-white">
        <h4>{{ $alumno->nombres }} {{ $alumno->apellidos }}</h4>
    </div>

    <div class="card-body">

        <p><strong>Documento:</strong> {{ $alumno->tipo_documento }} {{ $alumno->numero_documento }}</p>
        <p><strong>Correo:</strong> {{ $alumno->correo_electronico }}</p>
        <p><strong>Teléfono:</strong> {{ $alumno->telefono }}</p>
        <p><strong>Género:</strong> {{ $alumno->genero }}</p>

        <hr>

        <h3 class="text-primary">Cursos Realizados</h3>

        @forelse ($cursos as $curso)
            <div class="card mt-3">
                <div class="card-header bg-success text-white">
                    <strong>{{ $curso->nombre_curso }}</strong>
                </div>

                <div class="card-body">

                    <p><strong>Fecha inicio:</strong> 
                        {{ $curso->pivot->fecha_inicio ?? 'No registrada' }}
                    </p>

                    <p><strong>Fecha fin:</strong> 
                        {{ $curso->pivot->fecha_fin ?? 'No registrada' }}
                    </p>

                    <h5 class="text-secondary">Módulos del curso:</h5>
                    <ul>
                        @foreach ($curso->modulos as $mod)
                            <li>{{ $mod->nombre_modulo }}</li>
                        @endforeach
                    </ul>

                </div>
            </div>

        @empty
            <p class="text-danger">El alumno no tiene cursos registrados.</p>
        @endforelse

    </div>
</div>

@endsection
