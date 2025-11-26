@extends('adminlte::page')

@section('title', 'Alumnos')


@section('content_header')
<div class="row">
    <div class="col-3">


        <a data-bs-toggle="tooltip" title="Registrar nuevo alumno" href="{{ route('alumnos.create') }}"
            class="btn btn-outline-primary mt-2 mb-1 ml-2">
            <i class="fas fa-plus fa-lg"></i> Nuevo Alumno
        </a>
    </div>
    <div class="col-6">
        <h1 class="display-6 text-center">Gestión de Alumnos</h1>
    </div>
</div>
@endsection




@section('content')

<div>
    <a href="{{ route('alumnos.pdf') }}" class="btn btn-danger btn-sm">
        <i class="fas fa-file-pdf"></i> DESCARGAR PDF
    </a>

    <a href="{{ route('alumnos.pdf') }}" class="btn btn-info btn-sm" target="_blank">
        <i class="fas fa-eye"></i> Ver PDF
    </a>
</div>



{{-- Tabla --}}
<div class="card mt-3">
    <div class="card-header">
        <h5 class="card-title">Listado de Alumnos</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" id="myTable">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Documento</th>
                    <th>Nombre Completo</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Género</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->id }}</td>
                    <td>{{ $alumno->tipo_documento }} {{ $alumno->numero_documento }}</td>
                    <td>{{ $alumno->nombres }} {{ $alumno->apellidos }}</td>
                    <td>{{ $alumno->correo_electronico }}</td>
                    <td>{{ $alumno->telefono }}</td>
                    <td>{{ $alumno->genero }}</td>
                    <td>
                        <a href="{{ route('alumnos.detalle', $alumno->id) }}" class="btn btn-outline-info btn-sm">
                            <i class="fas fa-eye"></i> Detalle
                        </a>

                        <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-outline-warning btn-sm">
                            <i class="fas fa-pencil-alt"></i> Editar
                        </a>

                        <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm"
                                onsubmit="confirmarEliminacion(event)">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </form>

                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
        <a data-bs-toggle="tooltip" title="Volver al menú principal" href="{{ route('alumnos.index') }}"
            class="btn btn-outline-secondary mt-2 mb-1 ml-2">
            <i class="fas fa-arrow-left fa-lg"></i> Volver
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
    $(document).ready(function() {
        $('#myTable').DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection