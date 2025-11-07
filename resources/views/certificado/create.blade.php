@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Nuevo Certificado</h1>

    <form action="{{ route('certificados.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="codigo_interno" class="form-label">Código Interno</label>
            <input type="text" name="codigo_interno" id="codigo_interno" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="codigo_qr" class="form-label">Código QR</label>
            <input type="text" name="codigo_qr" id="codigo_qr" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="fecha_emision" class="form-label">Fecha de Emisión</label>
            <input type="date" name="fecha_emision" id="fecha_emision" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
            <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="resgistro_supervigilancia" class="form-label">Registro Supervigilancia</label>
            <input type="text" name="resgistro_supervigilancia" id="resgistro_supervigilancia" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="alumno_id" class="form-label">Alumno</label>
            <select name="alumno_id" id="alumno_id" class="form-select" required>
    <option value="">Seleccione un alumno</option>
    @foreach($alumnos as $alumno)
        <option value="{{ $alumno->id }}">{{ $alumno->nombres }} {{ $alumno->apellidos }}</option>
    @endforeach
</select>



        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('certificados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">
        Volver
    </a>
</div>
@endsection