@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Pago</h1>

    <form action="{{ route('pagos.update', $pago->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="alumno_id" class="form-label">Alumno</label>
            <select name="alumno_id" id="alumno_id" class="form-select" required>
                @foreach ($alumnos as $alumno)
                    <option value="{{ $alumno->id }}" {{ $pago->alumno_id == $alumno->id ? 'selected' : '' }}>
                        {{ $alumno->nombres }} {{ $alumno->apellidos }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="curso_id" class="form-label">Curso</label>
            <select name="curso_id" id="curso_id" class="form-select" required>
                @foreach ($cursos as $curso)
                    <option value="{{ $curso->id }}" {{ $pago->curso_id == $curso->id ? 'selected' : '' }}>
                        {{ $curso->nombre_curso }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="fecha_pago" class="form-label">Fecha de Pago</label>
            <input type="date" name="fecha_pago" id="fecha_pago" class="form-control" value="{{ $pago->fecha_pago }}" required>
        </div>

        <div class="mb-3">
            <label for="monto" class="form-label">Monto</label>
            <input type="number" name="monto" id="monto" class="form-control" value="{{ $pago->monto }}" step="0.01" required>
        </div>

        <div class="mb-3">
            <label for="metodo_pago" class="form-label">Método de Pago</label>
            <select name="metodo_pago" id="metodo_pago" class="form-select" required>
                <option value="Efectivo" {{ $pago->metodo_pago == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                <option value="Transferencia" {{ $pago->metodo_pago == 'Transferencia' ? 'selected' : '' }}>Transferencia</option>
                <option value="Tarjeta" {{ $pago->metodo_pago == 'Tarjeta' ? 'selected' : '' }}>Tarjeta</option>
                <option value="Cheque" {{ $pago->metodo_pago == 'Cheque' ? 'selected' : '' }}>Cheque</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="estado_pago" class="form-label">Estado del Pago</label>
            <select name="estado_pago" id="estado_pago" class="form-select" required>
                <option value="Completado" {{ $pago->estado_pago == 'Completado' ? 'selected' : '' }}>Completado</option>
                <option value="Pendiente" {{ $pago->estado_pago == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="Cancelado" {{ $pago->estado_pago == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-dark px-4">💾 Actualizar</button>
        <a href="{{ route('pagos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
