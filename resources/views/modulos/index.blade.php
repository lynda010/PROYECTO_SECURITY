@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Módulos</h1>

    <a href="{{ route('modulos.create') }}" class="btn btn-primary mb-3">Nuevo Módulo</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped" id="myTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Módulo</th>
                <th>Curso Asociado</th>
                <th>Administrar</th>

            </tr>
        </thead>
        <tbody>

            @foreach($modulos as $modulo)
            <tr>
                <td>{{ $modulo->id }}</td>
                <td>{{ $modulo->nombre_modulo }}</td>
                <td>{{ $modulo->curso->nombre_curso }}</td>
                <td>
                    <a href="{{ route('modulos.edit', $modulo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('modulos.destroy', $modulo->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">
        Volver
    </a>
</div>
@endsection
@section('js')
<script>
$(document).ready(function () {
    $('#myTable').DataTable({
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
        }
    });
});

</script>
@endsection