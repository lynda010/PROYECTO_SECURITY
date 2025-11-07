@extends('layouts.app')

@section('Content')
<div class="container">
    <h1>Lista de Alumnos</h1>

    <a href="{{ route('alumnos.create') }}" class="btn btn-primary mb-3">Registrar Nuevo Alumno</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Documento</th>
                <th>Nombre Completo</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Género</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->id }}</td>
                <td>{{ $alumno->tipo_documento }} {{ $alumno->numero_documento }}</td>
                <td>{{ $alumno->nombres }} {{ $alumno->apellidos }}</td>
                <td>{{ $alumno->correo_electronico }}</td>
                <td>{{ $alumno->telefono }}</td>
                <td>{{ $alumno->genero }}</td>
                <td>
                    <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-warning">Editar</a>

                    <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" style="display:inline-block;">
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