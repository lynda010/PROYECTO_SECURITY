@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registros de Alumnos que Completan Módulos</h1>

    <a href="{{ route('alumno_completa_modulos.create') }}" class="btn btn-primary mb-3">Nuevo Registro</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Alumno</th>
                <th>Módulo</th>
                <th>Curso</th>
                <th>Fecha de Finalización</th>
                <th>Estado</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($alumno_completa_modulos as $alumno_completa_modulo)
            <tr>
                <td>{{ $alumno_completa_modulo->id }}</td>
                <td>{{ $alumno_completa_modulo->alumno->nombres }} {{ $registro->alumno->apellidos }}</td>
                <td>{{ $alumno_completa_modulo->modulo ? $registro->modulo->nombre_modulo : 'Sin módulo' }}</td>
                <td>{{ $alumno_completa_modulo->modulo && $registro->modulo->curso ? $registro->modulo->curso->nombre_curso : 'Sin curso' }}</td>
                <td>{{ $alumno_completa_modulo->fecha_finalizacion }}</td>
                <td>{{ $alumno_completa_modulo->nombre_certificado->nombre_modulo}}</td>
                <td>{{ $alumno_completa_modulo->estado }}</td>
                <td>
                    <a href="{{ route('alumno_completa_modulos.edit', $alumno_completa_modulo>id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('alumno_completa_modulos.destroy', $alumno_completa_modulo->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">
        Volver
    </a>
</div>
@endsection