@extends('layouts.app')

@section('content')
<div class="container">

    

    <h2>Detalle del Grupo</h2>

    <div class="card mb-4">
        <div class="card-body">

            {{-- Nombre del Grupo --}}
            <h4>{{ $grupo->nombre_grupo ?? 'Nombre no disponible' }}</h4>

            {{-- Descripción --}}
            <p><strong>Descripción:</strong> 
                {{ $grupo->descripcion ?? 'Sin descripción' }}
            </p>

            {{-- Fechas --}}
            <p><strong>Creado el:</strong> 
                {{ $grupo->created_at ? $grupo->created_at->format('Y-m-d') : 'N/A' }}
            </p>

            <p><strong>Última actualización:</strong> 
                {{ $grupo->updated_at ? $grupo->updated_at->format('Y-m-d') : 'N/A' }}
            </p>

        </div>
        
    </div>

    <h3>Alumnos del Grupo</h3>

    {{-- TOTAL DE ALUMNOS --}}
    <p><strong>Total de alumnos:</strong> {{ $totalAlumnos }}</p>

    @if(isset($alumnos) && $alumnos->isEmpty())
        <div class="alert alert-warning">
            Este grupo no tiene alumnos registrados.
        </div>
    @else
        <div class="list-group mb-4">
            @foreach($alumnos as $alumno)
                <div class="list-group-item">

                    <strong>
                        {{ $alumno->nombre_completo 
                            ?? trim(($alumno->nombres ?? '') . ' ' . ($alumno->apellidos ?? '')) 
                            ?? 'Alumno sin nombre' }}
                    </strong>

                    <div class="small text-muted">
                        Documento: 
                        {{ $alumno->documento 
                            ?? (($alumno->tipo_documento ?? '') . ' ' . ($alumno->numero_documento ?? '')) 
                            ?? 'N/A' }}
                    </div>
                    

                </div>
                
            @endforeach
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mt-2 mb-1 ml-2">
        <i class="fas fa-arrow-left fa-lg"></i> Volver
    </a>
    @endif

</div>
@endsection
