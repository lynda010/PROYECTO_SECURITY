@extends('adminlte::page')

@section('title', 'Certificados')


@section('content_header')
<div class="row">
    <div class="col-3">
        <a data-bs-toggle="tooltip" title="Registrar nuevo Certificado" href="{{ route('certificados.create') }}"
            class="btn btn-outline-primary mt-2 mb-1 ml-2">
            <i class="fas fa-plus fa-lg"></i> Nuevo Certificado
        </a>

    </div>
    <div class="col-6">
        <h1 class="display-6 text-center">Gestión de Certificado</h1>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped" id="myTable">
    <thead>
        <tr>
            <th>Código Interno</th>
            <th>Código QR</th>
            <th>Fecha Emisión</th>
            <th>Fecha Vencimiento</th>
            <th>Registro Supervigilancia</th>
            <th>Alumno</th>
            <td>Administrar</td>

        </tr>
    </thead>
    <tbody>
        @foreach ($certificados as $certificado)
        <tr>
            <td>{{ $certificado->codigo_interno }}</td>
            <td>{{ $certificado->codigo_qr }}</td>
            <td>{{ $certificado->fecha_emision }}</td>
            <td>{{ $certificado->fecha_vencimiento }}</td>
            <td>{{ $certificado->resgistro_supervigilancia }}</td>
            <td>{{ $certificado->alumno->nombres }} {{ $certificado->alumno->apellidos }}</td>
            <td>
                <a href="{{ route('certificados.edit', $certificado->codigo_interno) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('certificados.destroy', $certificado->codigo_interno) }}" method="POST"
                        style="display:inline-block;" onsubmit="confirmarEliminacion(event)">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ url('/') }}" class="btn btn-outline-secondary mt-2 mb-1 ml-2">
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