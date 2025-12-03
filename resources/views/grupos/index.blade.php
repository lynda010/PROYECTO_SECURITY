@extends('adminlte::page')

@section('title', 'Grupos')

@section('content_header')
<div class="row">
    <div class="col-3">
        <a data-bs-toggle="tooltip" title="Registrar nuevo grupo"
            href="{{ route('grupos.create') }}"
            class="btn btn-outline-primary mt-2 mb-1 ml-2">
            <i class="fas fa-plus fa-lg"></i> Nuevo Grupo
        </a>
    </div>
</div>

{{-- ALERTA DE ERROR --}}
@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
    <strong>⚠ Error:</strong> {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif
@endsection


@section('content')
<div class="mt-3">
    <table class="table table-bordered table-striped" id="myTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Grupo</th>
                <th>Descripción</th>
                <th>Administrar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($grupos as $grupo)
            <tr>
                <td>{{ $grupo->id }}</td>
                <td>{{ $grupo->nombre_grupo }}</td>
                <td>{{ $grupo->descripcion }}</td>
                <td>






                    {{-- EDITAR --}}
                    <a href="{{ route('grupos.edit', $grupo->id) }}" class="btn btn-warning btn-sm">Editar</a>

                    {{-- ELIMINAR --}}
                    <form action="{{ route('grupos.destroy', $grupo->id) }}" method="POST"
                        style="display:inline-block;" onsubmit="confirmarEliminacion(event)">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                    <a href="{{ route('grupos.detalle', $grupo->id) }}"
                        class="btn btn-sm"
                        style="background-color:#0d6efd; color:white;">
                        Ver Detalle
                    </a>






                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mt-2 mb-1 ml-2">
        <i class="fas fa-arrow-left fa-lg"></i> Volver
    </a>


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

            const form = event.target.closest('form');

            Swal.fire({
                title: '¿Estás seguro?',
                text: "Esta acción no se puede revertir.",
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


    {{-- DATATABLES --}}
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                language: {
                    url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
                }
            });
        });
    </script>

    {{-- SWEETALERT2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @endsection