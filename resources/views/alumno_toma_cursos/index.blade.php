@extends('adminlte::page')

@section('title', 'Alumnos')


@section('content_header')
<div class="row">
    <div class="col-3">


        <a data-bs-toggle="tooltip" title="Registrar nuevo alumno" href="{{ route('alumnos.create') }}"
            class="btn btn-outline-primary mt-2 mb-1 ml-2">
            <i class="fas fa-plus fa-lg"></i> 
        </a>
    </div>
    <div class="col-6">
        <h1 class="display-6 text-center">Gestión de Alumnos</h1>
    </div>
</div>
    <a href="{{ route('alumno_toma_cursos.create') }}" class="btn btn-primary mb-3">Nuevo Registro</a>
<a href="{{ route('alumno_toma_cursos.create.masivo') }}" class="btn btn-primary mb-3">Registro Masivo</a>


    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped" id="myTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Alumno</th>
                <th>Curso</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Calificación</th>
                <th>Aprobado</th>
                <th>Administrar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registros as $registro)
            <tr>
                <td>{{ $registro->id }}</td>
                <td>{{ $registro->alumno->nombres }} {{ $registro->alumno->apellidos }}</td>
                <td>{{ $registro->curso->nombre_curso }}</td>
                <td>{{ $registro->fecha_inicio }}</td>
                <td>{{ $registro->fecha_fin }}</td>
                <td>{{ $registro->calificacion }}</td>
                <td>{{ $registro->aprobado ? 'Sí' : 'No' }}</td>
                <td>
                    <a href="{{ route('alumno_toma_cursos.edit', $registro->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('alumno_toma_cursos.destroy', $registro->id) }}" method="POST" style="display:inline-block;">
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
@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'success',
            title: '¡Éxito!',
            text: '{{ session("success") }}',
            confirmButtonText: 'Aceptar',
            timer: 3000
        });
    });
</script>
@endif
@endsection
@section('js')
<script>
    function confirmarEliminacion(event) {
        event.preventDefault();

        const form = event.target.closest("form");

        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
    </script>
<script>
$(document).ready(function () {
    $('#myTable').DataTable({
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
        }
    });
});

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@endsection