@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Nuevo Pago</h1>

    <form action="{{ route('pagos.store') }}" method="POST">
        @csrf

        {{-- Alumno --}}
        <div class="mb-3 w-50">
            <label for="alumno_id" class="form-label">Alumno</label>
            <select
                name="alumno_id"
                id="alumno_id"
                class="form-control @error('alumno_id') is-invalid @enderror"
                required>
                <option value="">Seleccione un alumno</option>

                @foreach ($alumnos as $alumno)
                <option value="{{ $alumno->id }}">
                    {{ $alumno->nombres }} {{ $alumno->apellidos }}
                </option>
                @endforeach
            </select>

            @error('alumno_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Curso --}}
        <div class="mb-3 w-50">
            <label for="curso_id" class="form-label">Curso</label>
            <select
                name="curso_id"
                id="curso_id"
                class="form-control @error('curso_id') is-invalid @enderror"
                required>
                <option value="">Seleccione un curso</option>

                @foreach ($cursos as $curso)
                <option value="{{ $curso->id }}">
                    {{ $curso->nombre_curso }}
                </option>
                @endforeach
            </select>

            @error('curso_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Fecha de Pago --}}
        <div class="mb-3 w-50">
            <label for="fecha_pago" class="form-label">Fecha de Pago</label>
            <input
                type="date"
                name="fecha_pago"
                id="fecha_pago"
                class="form-control @error('fecha_pago') is-invalid @enderror"
                required>

            @error('fecha_pago')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Monto --}}
        <div class="mb-3 w-50">
            <label for="monto" class="form-label">Monto</label>
            <input
                type="number"
                name="monto"
                id="monto"
                class="form-control @error('monto') is-invalid @enderror"
                step="0.01"
                required>

            @error('monto')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Método de Pago --}}
        <div class="mb-3 w-50">
            <label for="metodo_pago" class="form-label">Método de Pago</label>
            <select
                name="metodo_pago"
                id="metodo_pago"
                class="form-control @error('metodo_pago') is-invalid @enderror"
                required>
                <option value="">Seleccione método</option>
                <option value="Efectivo">Efectivo</option>
                <option value="Transferencia">Transferencia</option>
                <option value="Tarjeta">Tarjeta</option>
            </select>

            @error('metodo_pago')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Estado del Pago --}}
        <div class="mb-3 w-50">
            <label for="estado_pago" class="form-label">Estado del Pago</label>
            <select
                name="estado_pago"
                id="estado_pago"
                class="form-control @error('estado_pago') is-invalid @enderror"
                required>
                <option value="">Seleccione estado</option>
                <option value="Completado">Completado</option>
                <option value="Pendiente">Pendiente</option>
                <option value="Cancelado">Cancelado</option>
            </select>

            @error('estado_pago')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('pagos.index') }}" class="btn btn-secondary">Cancelar</a>

    </form>

    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection