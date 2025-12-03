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
                    <th class="text-center">
                        <input type="checkbox" id="selectAllCursos"> Seleccionar todo
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach($cursos as $curso)
                <tr>
                    <td>{{ $curso->id }}</td>
                    <td>{{ $curso->nombre_curso }}</td>
                    <td class="text-center">
                        <input type="checkbox" class="cursoCheckbox" name="curso_ids[]" value="{{ $curso->id }}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>




        <table class="table table-bordered" id="myTableAlumnos">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre del alumno</th>
                    <th class="text-center">
                        <input type="checkbox" id="selectAllAlumnos"> Seleccionar todo
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->id }}</td>
                    <td>{{ $alumno->nombres }} {{ $alumno->apellidos }}</td>
                    <td class="text-center">
                        <input type="checkbox" class="alumnoCheckbox" name="alumno_ids[]" value="{{ $alumno->id }}">
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    const selectAll = document.getElementById('selectAllCursos');
    const checkboxes = document.querySelectorAll('.cursoCheckbox');

    selectAll.addEventListener('change', function () {
        checkboxes.forEach(cb => cb.checked = this.checked);
    });
});
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const selectAllAlumnos = document.getElementById('selectAllAlumnos');
    const alumnoCheckboxes = document.querySelectorAll('.alumnoCheckbox');

    selectAllAlumnos.addEventListener('change', function () {
        alumnoCheckboxes.forEach(cb => cb.checked = this.checked);
    });
});
</script>



@endsection
