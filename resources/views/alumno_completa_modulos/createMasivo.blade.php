@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Finalización de Módulo por Alumno</h1>

    <form action="{{ route('alumno_completa_modulos.storeMasivo') }}" method="POST">
        @csrf

        <div class="mb-3">

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

        </div>


        <div class="mb-3">



            <table class="table table-bordered" id="myTabledos">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Curso</th>
                        <th>Nombre del Módulo</th>
                        <th>Seleccionar</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($modulos as $modulo)
                    <tr>
                        <td>{{ $modulo->id }}</td>
                        <td>{{ $modulo->curso->nombre_curso }}</td>
                        <td>{{ $modulo->nombre_modulo }}</td>

                        <td class="text-center">
                            <input type="checkbox"
                                name="modulo_ids[]"
                                value="{{ $modulo->id }}">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <div class="mb-3">
            <label for="fecha_finalizacion" class="form-label">Fecha de Finalización</label>
            <input type="date" name="fecha_finalizacion" id="fecha_finalizacion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-control" required>
                <option value="">Seleccione estado</option>
                <option value="Aprobado">Aprobado</option>
                <option value="Reprobado">Reprobado</option>
                <option value="En curso">En curso</option>
            </select>
        </div>


        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('alumno_completa_modulos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">
        Volver
    </a>
</div>
@endsection


@section('js')
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('#myTabledos').DataTable({
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
            }
        });
    });
</script>
@endsection