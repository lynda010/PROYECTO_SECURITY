@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Nuevo Módulo</h1>

    <form action="{{ route('modulos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre_modulo" class="form-label">Nombre del Módulo</label>
            <input type="text" name="nombre_modulo" id="nombre_modulo" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="curso_id" class="form-label">Curso Asociado</label>
            <select name="curso_id" id="curso_id" class="form-select" required>
                <option value="">Seleccione un curso</option>


                

                <optgroup label="Fundamentación">
                    <option value="1">Fundamentación Vigilancia</option>
                    <option value="Fundamentacion escolta">Fundamentación Escolta</option>
                    <option value="Fundamentacion medios tecnológicos">Fundamentación Medios Tecnológicos</option>
                    <option value="Fundamentacion manejador canino">Fundamentación Manejador Canino</option>
                </optgroup>

                <optgroup label="Reentrenamiento">
                    <option value="Reentrenamiento vigilancia">Reentrenamiento Vigilancia</option>
                    <option value="Reentrenamiento escolta">Reentrenamiento Escolta</option>
                    <option value="Reentrenamiento medios tecnológicos">Reentrenamiento Medios Tecnológicos</option>
                    <option value="Reentrenamiento manejador canino">Reentrenamiento Manejador Canino</option>
                </optgroup>

                <optgroup label="Seminarios">
                    <option value="Control acceso">Control Acceso</option>
                    <option value="Atención al cliente">Atención al Cliente</option>
                    <option value="Primeros auxilios">Primeros Auxilios</option>
                    <option value="Manejo seguro armas de fuego">Manejo Seguro de Armas de Fuego</option>
                    <option value="Ejercicio práctico de tiro polígono">Ejercicio Práctico de Tiro en Polígono</option>
                    <option value="Defensa personal">Defensa Personal</option>
                    <option value="Nueva código policía">Nuevo Código de Policía</option>
                    <option value="Manejo garret">Manejo Garret</option>
                    <option value="Análisis de riesgos">Análisis de Riesgos</option>
                </optgroup>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('modulos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
