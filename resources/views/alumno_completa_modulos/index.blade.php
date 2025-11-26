@extends('adminlte::page')

@section('title', 'Alumnos')


@section('content_header')
<div class="row">
    <div class="col-3">


        <a data-bs-toggle="tooltip" title="Registrar nuevo alumno" href="{{ route('alumno_completa_modulos.create') }}"
            class="btn btn-outline-primary mt-2 mb-1 ml-2">
            <i class="fas fa-plus fa-lg"></i> 
        </a>
    </div>
    <div class="col-6">
        <h1 class="display-6 text-center"></h1>
    </div>
</div>
<div class="container">
    <h1>Registros de Alumnos que Completan Módulos</h1>

    <a href="{{ route('alumno_completa_modulos.create') }}" cl
    ass="btn btn-primary mb-3">Nuevo Registro</a>


    <a href="{{ route('alumno_completa_modulos.createMasivo') }}" class="btn btn-primary mb-3">Nuevo Registro Masivo</a>



    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped" id="myTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Alumno</th>
                <th>Módulo</th>
                <th>Curso</th>
                <th>Fecha de Finalización</th>
                <th>Estado</th>
                <th>Administrar</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($alumno_completa_modulos as $alumno_completa_modulo)
            <tr>
                <td>{{ $alumno_completa_modulo->id }}</td>

                {{-- Alumno (controla si existe la relación) --}}
                <td>
                    {{ optional($alumno_completa_modulo->alumno)->nombres ?? 'Sin nombre' }}
                    {{ optional($alumno_completa_modulo->alumno)->apellidos ?? '' }}
                </td>

                {{-- Módulo --}}
                <td>
                    {{ optional($alumno_completa_modulo->modulo)->nombre_modulo ?? 'Sin módulo' }}
                </td>

                {{-- Curso (desde modulo->curso) --}}
                <td>
                    {{ optional(optional($alumno_completa_modulo->modulo)->curso)->nombre_curso ?? 'Sin curso' }}
                </td>

                <td>{{ $alumno_completa_modulo->fecha_finalizacion ?? '—' }}</td>

                <td>{{ $alumno_completa_modulo->estado ?? '—' }}</td>

                <td>
                    <a href="{{ route('alumno_completa_modulos.edit', $alumno_completa_modulo->id) }}" class="btn btn-warning btn-sm">Editar</a>

                    <form action="{{ route('alumno_completa_modulos.destroy', $alumno_completa_modulo->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar registro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="text-center">No hay registros</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Volver</a>
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