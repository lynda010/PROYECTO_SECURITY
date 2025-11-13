@extends('layouts.app')

@section('content')
<div class="container" style="background-color:#f5f7fa; border-radius:10px; padding:25px;">

    <!-- Título principal -->
    <h2 class="fw-bold mb-4" style="color:#004d40;">Tipos de Curso</h2>

    <!-- Botón Nuevo -->
    <a href="{{ route('tipo_cursos.create') }}" class="btn" style="background-color:#5bc0de; color:white; font-weight:bold;">
        Nuevo Tipo de Curso
    </a>

    <!-- Mensaje de éxito -->
    @if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif

    <!-- Tabla -->
    <table class="table table-bordered mt-3 align-middle text-center">
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
                    <a href="{{ route('tipo_cursos.edit', $item->id) }}"
                        class="btn btn-warning btn-sm fw-bold"
                        style="background-color: #f0ad4e; border-color:#eea236;">
                        Editar
                    </a>

                    <form action="{{ route('tipo_cursos.destroy', $item->id) }}"
                        method="POST"
                        style="display:inline-block;">
                        @csrf
                        <button type="submit"
                            class="btn btn-danger btn-sm fw-bold"
                            onclick="return confirm('¿Deseas eliminar este tipo de curso?')">
                            Eliminar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Botón Volver -->
    <a href="{{ url()->previous() }}"
        class="btn mt-3"
        style="background-color:#6c757d; color:white; font-weight:bold;">
        Volver
    </a>

</div>
@endsection
