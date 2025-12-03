@extends('adminlte::page')

@section('title', 'Alumnos')


@section('content_header')
<div class="row">
    <div class="col-3">

    </div>
    <div class="col-6">
        <h1 class="display-6 text-center">Gestión de Alumnos</h1>
    </div>
</div>
<a href="{{ route('alumno_toma_cursos.create') }}" class="btn btn-outline-primary mt-2 mb-1 ml-2">Nuevo Registro</a>

<a href="{{ route('alumno_toma_cursos.create.masivo') }}" class="btn btn-outline-primary mt-2 mb-1 ml-2">Registro Masivo</a>


<div class="row mt-3 mb-2">
    <div class="col-4">
        <select id="filtroGrupo" class="form-control">
            <option value="">-- Filtrar por grupo --</option>
            @foreach ($registros->pluck('grupo')->unique('id') as $grupo)
            <option value="{{ $grupo->id }}">{{ $grupo->nombre_grupo }}</option>
            @endforeach
        </select>
    </div>


    <div class="col-md-4 d-flex align-items-end">
        <a id="btnCalificarGrupo" class="btn btn-success w-100">
            Calificar Módulos por grupo
        </a>
    </div>
</div>



<table class="table table-bordered table-striped" id="myTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>grupo</th>
            <th>Curso</th>
            <th>Alumno</th>
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
            <td>{{ $registro->grupo->nombre_grupo}}</td>
            <td>{{ $registro->curso->nombre_curso }}</td>
            <td>{{ $registro->alumno->nombres }} {{ $registro->alumno->apellidos }}</td>
            <td>{{ $registro->fecha_inicio }}</td>
            <td>{{ $registro->fecha_fin }}</td>
            <td>{{ $registro->calificacion }}</td>
            <td>{{ $registro->aprobado ? 'Sí' : 'No' }}</td>
            <td>

                <a href="{{ route('alumno_completa_modulos.createMasivo', [
                        $registro->curso->id,
                        $registro->alumno->id
                    ]) }}"
                    class="btn btn-warning btn-sm">
                    Calificar Módulos
                </a>


                <a href="{{ route('alumno_toma_cursos.edit', $registro->id) }}" class="btn btn-success btn-sm">Editar</a>

                <form id="formEliminarAlumnoTomaCurso{{ $registro->id }}"
                    action="{{ route('alumno_toma_cursos.destroy', $registro->id) }}"
                    method="POST">
                    @csrf

                    <button type="button" class="btn btn-danger"
                        onclick="confirmarEliminacionAlumnoTomaCurso({{ $registro->id }})">
                        Eliminar
                    </button>
                </form>



            </td>
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
    function confirmarEliminacionAlumnoTomaCurso(id) {
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
                document.getElementById('formEliminarAlumnoTomaCurso' + id).submit();
            }
        });
    }
</script>


<script>
    $(document).ready(function() {

        // DataTable
        var table = $('#myTable').DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });

        // Filtro por grupo
        $('#filtroGrupo').on('change', function() {
            var grupoId = $(this).val();

            // Filtro de la tabla
            table.column(1).search($(this).find('option:selected').text()).draw();

            // Habilitar y actualizar botón
            if (grupoId) {
                $('#btnCalificarGrupo')
                    .removeClass('disabled')
                    .attr('href', '/alumno_completa_modulos/createMasivo/' + grupoId);
            } else {
                $('#btnCalificarGrupo').addClass('disabled').removeAttr('href');
            }
        });

    });
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@endsection