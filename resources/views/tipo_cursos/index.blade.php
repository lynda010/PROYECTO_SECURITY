@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tipos de Curso</h1>
    <a href="{{ route('tipo_cursos.create') }}" class="btn btn-primary mb-3">Nuevo Tipo de Curso</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del Tipo</th>
                <td>Administrar </td>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($tiposCurso as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nombre_tipo }}</td>
                    

                    <td>
                        <a href="{{ route('tipo_cursos.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('tipo_cursos.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection
