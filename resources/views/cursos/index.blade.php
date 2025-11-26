@extends('adminlte::page')

@section('title', 'Cursos')


@section('content_header')
<div class="row">
    <div class="col-3">


        <a data-bs-toggle="tooltip" title="Registrar nuevo alumno" href="{{ route('alumnos.create') }}"
            class="btn btn-outline-primary mt-2 mb-1 ml-2">
            <i class="fas fa-plus fa-lg"></i> Nuevo Curso
        </a>
    </div>
    <div class="col-6">
        <h1 class="display-6 text-center">Gestión de Cursos</h1>
    </div>
</div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped" id="myTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Curso</th>
                <th>Valor ($)</th>
                <th>Duración (horas)</th>
                <th>Días Presenciales</th>
                <th>Tipo de Curso</th>
                <th>Administrar</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
            <tr>
                <td>{{ $curso->id }}</td>
                <td>{{ $curso->nombre_curso }}</td>
                <td>${{ number_format($curso->valor, 2) }}</td>
                <td>{{ $curso->duracion_horas }} horas</td>
                <td>{{ $curso->duracion_dias_presencial }} dias</td>
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




@section('js')
<script>
$(document).ready(function () {
    $('#myTable').DataTable({
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
        }
    });
});

</script>
@endsection
