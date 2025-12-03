@extends('adminlte::page')

@section('title', 'Cursos')


@section('content_header')
<div class="row">
    <div class="col-3">


        <a data-bs-toggle="tooltip" title="Registrar nuevo alumno" href="{{ route('cursos.create') }}"
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
                <form id="formEliminarCurso{{ $curso->id }}"
                    action="{{ route('cursos.destroy', $curso->id) }}"
                    method="POST"
                    style="display:inline-block;">
                    @csrf

                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmarEliminacionCurso({{ $curso->id }})">
                        Eliminar
                    </button>
                </form>

        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ url('/') }}" class="btn btn-outline-secondary mt-2 mb-1 ml-2">
    <i class="fas fa-arrow-left fa-lg"></i> Volver
</a>

@endsection
@if(session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: '¡Atención!',
                text: "{{ session('error') }}",
                confirmButtonText: 'Aceptar',
            });
        });
    </script>
    @endif



@section('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmarEliminacionCurso(id) {
        Swal.fire({
            title: "¿Estás seguro?",
            text: "¡No podrás revertir esto!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Sí, eliminar",
            cancelButtonText: "Cancelar"
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('formEliminarCurso' + id).submit();
            }
        });
    }
</script>

@endsection