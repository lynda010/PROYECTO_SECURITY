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
            @foreach ($registros as $registro)
            <tr>
                <td>{{ $registro->id }}</td>
                <td>{{ $registro->alumno->nombres }} {{ $registro->alumno->apellidos }}</td>
                <td>{{ $registro->modulo->nombre_modulo }}</td>
                <td>{{ $registro->modulo->curso->nombre_curso }}</td>
                <td>{{ $registro->fecha_finalizacion }}</td>
                <td>{{ $registro->estado }}</td>
                <td>
                    <a href="{{ route('alumno_completa_modulos.edit', $registro->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('alumno_completa_modulos.destroy', $registro->id) }}" method="POST" style="display:inline-block;">
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