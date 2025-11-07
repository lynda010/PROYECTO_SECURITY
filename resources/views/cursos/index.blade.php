@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Cursos</h1>

    <a href="{{ route('cursos.create') }}" class="btn btn-primary mb-3">Nuevo Curso</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Curso</th>
                <th>Valor ($)</th>
                <th>Duración (horas)</th>
                <th>Días Presenciales</th>
                <th>Tipo de Curso</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
            <tr>
                <td>{{ $curso->id }}</td>
                <td>{{ $curso->nombre_curso }}</td>
                <td>${{ number_format($curso->valor, 2) }}</td>
                <td>{{ $curso->duracion_horas }}</td>
                <td>{{ $curso->duracion_dias_presencial }}</td>
                <td>{{ $curso->tipoCurso->nombre_tipo }}</td>
                <td>
                    <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">
        Siguiente
    </a>
</div>
@endsection