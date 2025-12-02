@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registro Masivo</h1>

    <form action="{{ route('alumno_toma_cursos.storemasivo') }}" method="POST">
        @csrf



        <div class="mb-3">
            <label for="grupo_id" class="form-label">Grupo</label>
            <select name="grupo_id" id="grupo_id" class="form-control" required>
                <option value="">Seleccione un curso</option>
                @foreach ($grupos as $grupo)
                    <option value="{{ $grupo->id }}">{{ $grupo->nombre_grupo }}</option>
                @endforeach
            </select>
        </div>


           <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre del curso</th>
                    <th>Seleccionar curso</th>
                </tr>
            </thead>

            <tbody>
                @foreach($cursos as $curso)
                <tr>
                    <td>{{ $curso->id }}</td>
                    <td>{{ $curso->nombre_curso}}</td>

                    <td class="text-center">
                        <input type="checkbox"
                            name="curso_ids[]"
                            value="{{ $curso->id }}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>



         <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre del alumno</th>
                    <th>Seleccionar alumno</th>
                </tr>
            </thead>

            <tbody>
                @foreach($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->id }}</td>
                    <td>{{ $alumno->nombres }} {{ $alumno->apellidos }}</td>

                    <td class="text-center">
                        <input type="checkbox"
                            name="alumno_ids[]"
                            value="{{ $alumno->id }}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('alumno_toma_cursos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
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
