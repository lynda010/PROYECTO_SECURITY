@extends('adminlte::page')

@section('title', 'Tipos de Curso')

@section('content_header')
<div class="row">
    <div class="col-3">
        <a data-bs-toggle="tooltip" title="Registrar nuevo tipo de curso" href="{{ route('tipo_cursos.create') }}"></a>
            
            
      
    </div>
    <div class="col-6">
        <h1 class="display-6 text-center">Gestión de Tipos de Curso</h1>
    </div>
</div>
@endsection

@section('content')
<div class="container" style="background-color:#f5f7fa; border-radius:10px; padding:25px;">



    <a data-bs-toggle="tooltip" title="Registrar nuevo tipo de curso" href="{{ route('tipo_cursos.create') }}"
        class="btn btn-outline-primary mt-2 mb-1 ml-2">
        <i class="fas fa-plus fa-lg"></i> Nuevo Tipo de Curso
    </a>

    <table class="table table-bordered mt-3 align-middle text-center" id="myTable">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nombre del Tipo</th>
                <th>Administrar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tiposCurso as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nombre_tipo }}</td>
                <td>
                    <a href="{{ route('tipo_cursos.edit', $item->id) }}" class="btn btn-warning btn-sm fw-bold">
                        Editar
                    </a>

                    <form action="{{ route('tipo_cursos.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm fw-bold">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ url()->previous() }}" class="btn mt-3" style="background-color:#6c757d; color:white; font-weight:bold;">
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



@section('scripts')
<script>
    $(document).ready(function() {

        // DATATABLE
        $('#myTable').DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });


        // 🔥 PASO 3: variables desde PHP a JS — ARREGLADO!
        const successMsg = "{{ session('success') }}";
        const errorMsg = "{{ session('error') }}";


        // ALERTA GLOBAL (la pediste)
        Swal.fire({
            title: "Drag me!",
            icon: "success",
            draggable: true
        });


        // 🔥 ALERTA DE ÉXITO
        if (successMsg) {
            Swal.fire({
                title: "Éxito",
                text: successMsg,
                icon: "success",
                draggable: true
            });
        }

        // 🔥 ALERTA DE ERROR
        if (errorMsg) {
            Swal.fire({
                title: "Error",
                text: errorMsg,
                icon: "error"
            });
        }

    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection