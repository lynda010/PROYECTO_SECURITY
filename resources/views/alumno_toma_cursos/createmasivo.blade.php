@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registro Masivo</h1>

    <form action="{{ route('alumno_toma_cursos.storemasivo') }}" method="POST">
        @csrf



            <div class="mb-3">
            <label for="curso_id" class="form-label">Curso</label>
            <select name="curso_id" id="curso_id" class="form-control" required>
                <option value="">Seleccione un curso</option>
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nombre_curso }}</option>
                @endforeach
            </select>
        </div>

        

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

        <!--
        <div class="mb-3">
            <label for="fecha_fin" class="form-label">Fecha de Finalización</label>
            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="calificacion" class="form-label">Calificación</label>
            <input type="number" name="calificacion" id="calificacion" step="0.01" min="0" max="10" class="form-control">
        </div>

        <div class="mb-3">
            <label for="aprobado" class="form-label">Aprobado</label>
            <select name="aprobado" id="aprobado" class="form-select" required>
                <option value="">Seleccione</option>
                <option value="1">Sí</option>
                <option value="0">No</option>
            </select>
        </div>-->

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
