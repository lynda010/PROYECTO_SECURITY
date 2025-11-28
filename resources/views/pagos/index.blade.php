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



@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

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


                <form action="{{ route('pagos.destroy', $pago->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
<a href="{{ url()->previous() }}" class="btn btn-outline-secondary mt-2 mb-1 ml-2"><i class="fas fa-arrow-left fa-lg"></i>
    Volver
</a>

</a>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });
    });
</script>
@endsection