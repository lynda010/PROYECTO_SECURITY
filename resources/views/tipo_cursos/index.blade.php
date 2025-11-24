@extends('layouts.app')

@section('content')
<div class="container" style="background-color:#f5f7fa; border-radius:10px; padding:25px;">

    <h2 class="fw-bold mb-4" style="color:#004d40;">Tipos de Curso</h2>

    <a href="{{ route('tipo_cursos.create') }}" class="btn" style="background-color:#5bc0de; color:white; font-weight:bold;">
        Nuevo Tipo de Curso
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
@endsection




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
        const errorMsg   = "{{ session('error') }}";


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
@endsection
