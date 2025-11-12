@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registros de Alumnos que Completan Módulos</h1>

    <a href="{{ route('alumno_completa_modulos.create') }}" class="btn btn-primary mb-3">Nuevo Registro</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
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
<script>
$(document).ready(function () {
            $('#myTable').DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json'
                }
            });
        });
</script>
@endsection
