@extends('layouts.app')

@section('content')
<div class="container">

    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary mb-3">← Volver</a>

    <h2>Detalle del Alumno</h2>

    <div class="card mb-4">
        <div class="card-body">
            {{-- Nombre (soporta distintos nombres de campo) --}}
            <h4>
                {{ $alumno->nombre_completo 
                    ?? (trim(($alumno->nombres ?? '') . ' ' . ($alumno->apellidos ?? '')) ?: 'N/A') }}
            </h4>

            <p><strong>Nombre:</strong>
                {{ $alumno->nombre_completo 
                    ?? (trim(($alumno->nombres ?? '') . ' ' . ($alumno->apellidos ?? '')) ?: 'N/A') }}
            </p>

            {{-- Documento: admite documento compuesto o campos separados --}}
            <p><strong>Documento:</strong>
                {{ $alumno->documento 
                    ?? (($alumno->tipo_documento ?? '') . ' ' . ($alumno->numero_documento ?? '')) 
                    ?? 'N/A' }}
            </p>

            {{-- Correo: intenta varios nombres posibles --}}
            <p><strong>Correo:</strong>
                {{ $alumno->correo_electronico ?? $alumno->correo ?? 'N/A' }}
            </p>

            <p><strong>Teléfono:</strong> {{ $alumno->telefono ?? 'N/A' }}</p>
            <p><strong>Género:</strong> {{ $alumno->genero ?? 'N/A' }}</p>
        </div>
    </div>

    <h3>Cursos Realizados</h3>

    @if($cursos->isEmpty())
        <div class="alert alert-warning">
            Este alumno no ha tomado ningún curso.
        </div>
    @else
        @foreach($cursos as $curso)
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <strong>{{ $curso->nombre_curso ?? $curso->nombre ?? 'Curso sin nombre' }}</strong>
                </div>

                <div class="card-body">

                    {{-- Mostrar datos del pivot con comprobaciones --}}
                    @php
                        $pivot = $curso->pivot ?? null;
                    @endphp

                    <p><strong>Inicio:</strong>
                        {{ $pivot->fecha_inicio ?? $pivot->inicio ?? 'N/A' }}
                    </p>

                    <p><strong>Fin:</strong>
                        {{ $pivot->fecha_fin ?? $pivot->fin ?? 'N/A' }}
                    </p>

                    <p><strong>Calificación:</strong>
                        {{ $pivot->calificacion ?? 'N/A' }}
                    </p>

                    <p>
                        <strong>Aprobado:</strong>
                        @if(isset($pivot->aprobado))
                            {{ ($pivot->aprobado == 1 || $pivot->aprobado === true) ? 'Sí' : 'No' }}
                        @else
                            N/A
                        @endif
                    </p>

                    <h5>Módulos del curso:</h5>

                    @if(isset($curso->modulos) && $curso->modulos->isNotEmpty())
                        <ul>
                            @foreach ($curso->modulos as $mod)
                                <li>
                                    {{ $mod->nombre_modulo ?? $mod->nombre ?? 'Módulo sin nombre' }}
                                    @if(isset($mod->duracion_horas))
                                        — {{ $mod->duracion_horas }} hrs
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">No hay módulos registrados para este curso.</p>
                    @endif

                </div>
            </div>
        @endforeach
    @endif

</div>
@endsection
