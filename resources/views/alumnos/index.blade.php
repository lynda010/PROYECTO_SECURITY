@extends('adminlte::page')

@section('title', 'Alumnos')

@section('content_header')
<div class="row">
    <div class="col-3">
        <a data-bs-toggle="tooltip" title="Volver al menú principal" href="{{ route('alumnos.index') }}"
            class="btn btn-outline-secondary mt-2 mb-1 ml-2">
            <i class="fas fa-arrow-left fa-lg"></i> Volver
        </a>

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
{{-- DATA TABLES --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>



@section('scripts')
<script>
$(document).ready(function() {

    var tabla = $('#tablaAlumnos').DataTable({
        responsive: true,
        autoWidth: false,
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json'
        }
    });

    $('#filtroDocumento').on('keyup', function() {
        tabla.column(1).search(this.value).draw();
    });

    $('#filtroNombres').on('keyup', function() {
        tabla.column(2).search(this.value).draw();
    });

    $('#filtroCorreo').on('keyup', function() {
        tabla.column(3).search(this.value).draw();
    });

});
</script>
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


{{-- Filtros --}}
<div class="card card-primary mt-3">
    <div class="card-header">
        <h5 class="card-title">Filtros de búsqueda</h5>
    </div>

    <div class="card-body">
        <div class="row">

            <div class="col-md-3">
                <label>Documento</label>
                <input type="text" id="filtroDocumento" class="form-control" placeholder="Buscar documento...">
            </div>

            <div class="col-md-3">
                <label>Nombres</label>
                <input type="text" id="filtroNombres" class="form-control" placeholder="Buscar nombres...">
            </div>

            <div class="col-md-3">
                <label>Correo</label>
                <input type="text" id="filtroCorreo" class="form-control" placeholder="Buscar correo...">
            </div>

        </div>
    </div>
</div>


{{-- Tabla --}}
<div class="card mt-3">
    <div class="card-header">
        <h5 class="card-title">Listado de Alumnos</h5>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped" id="tablaAlumnos">
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

                        <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST"
                            class="d-inline" onsubmit="confirmarEliminacion(event)">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
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