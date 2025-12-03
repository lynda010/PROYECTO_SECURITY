@extends('adminlte::page')

@section('title', 'Pagos')


@section('content_header')
<div class="row">
    <div class="col-3">
        <a data-bs-toggle="tooltip" title="Registrar nuevo Pago" href="{{ route('pagos.create') }}"
            class="btn btn-outline-primary mt-2 mb-1 ml-2">
            <i class="fas fa-plus fa-lg"></i> Nuevo Pago
        </a>

    </div>
    <div class="col-6">
        <h1 class="display-6 text-center">Gestión de Pagos</h1>
    </div>
</div>



<div>
    <a href="{{ route('pagos.pdf') }}" class="btn btn-primary">
        <i class="fas fa-file-pdf"></i> Descargar PDF General
    </a>

    <a href="{{ route('pagos.pdf') }}" class="btn btn-info btn-sm">
        <i class="fas fa-eye"></i> Ver PDF General
    </a>

</div>

<table class="table table-bordered table-striped" id="myTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Alumno</th>
            <th>Curso</th>
            <th>Fecha de Pago</th>
            <th>Monto</th>
            <th>Método</th>
            <th>Estado</th>
            <th>Administrar</th>
        </tr>
    </thead>
    <tbody>
    <tbody>
        @foreach ($pagos as $pago)
        <tr>
            <td>{{ $pago->id }}</td>
            <td>{{ $pago->alumno->nombres }} {{ $pago->alumno->apellidos }}</td>
            <td>{{ $pago->curso->nombre_curso }}</td>
            <td>{{ $pago->fecha_pago }}</td>
            <td>${{ number_format($pago->monto, 2) }}</td>
            <td>{{ $pago->metodo_pago }}</td>
            <td>{{ $pago->estado_pago }}</td>

            <td>
                <a href="{{ route('pagos.edit', $pago->id) }}" class="btn btn-warning btn-sm">Editar</a>


                <form id="formEliminar{{ $pago->id }}" action="{{ route('pagos.destroy', $pago->id) }}" method="POST">
                    @csrf
                    <button type="button" class="btn btn-danger" onclick="confirmarEliminacion({{ $pago->id }})">
                        Eliminar
                    </button>
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>

</table>
<a href="{{ url('/') }}" class="btn btn-outline-secondary mt-2 mb-1 ml-2">
    <i class="fas fa-arrow-left fa-lg"></i> Volver
</a>

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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmarEliminacion(id) {
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
                document.getElementById('formEliminar' + id).submit();
            }
        });
    }
</script>

@endsection