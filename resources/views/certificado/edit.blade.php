@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Certificado</h1>

    @if(isset($certificado))
    <form action="{{ route('certificados.update', $certificado->codigo_interno) }}" method="POST">
        @csrf


        <div class="mb-3">
            <label for="codigo_interno" class="form-label">Código Interno</label>
            <input type="text" name="codigo_interno" id="codigo_interno" class="form-control" value="{{ $certificado->codigo_interno }}" readonly>
        </div>

        <div class="mb-3">
            <label for="codigo_qr" class="form-label">Código QR</label>
            <input type="text" name="codigo_qr" id="codigo_qr" class="form-control" value="{{ $certificado->codigo_qr }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_emision" class="form-label">Fecha de Emisión</label>
            <input type="date" name="fecha_emision" id="fecha_emision" class="form-control" value="{{ $certificado->fecha_emision }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
            <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" value="{{ $certificado->fecha_vencimiento }}" required>
        </div>

        <div class="mb-3">
            <label for="resgistro_supervigilancia" class="form-label">Registro Supervigilancia</label>
            <input type="text" name="resgistro_supervigilancia" id="resgistro_supervigilancia" class="form-control" value="{{ $certificado->resgistro_supervigilancia }}" required>
        </div>

        <div class="mb-3">
            <label for="alumno_id" class="form-label">Alumno</label>
            <select name="alumno_id" id="alumno_id" class="form-select" required>
                @foreach($alumnos as $alumno)
                <option value="{{ $alumno->id }}" {{ $certificado->alumno_id == $alumno->id ? 'selected' : '' }}>
                    {{ $alumno->nombres }} {{ $alumno->apellidos }}
                </option>
                @endforeach

            </select>
        </div>

        <button type="submit" class="btn btn-dark px-4">💾 Actualizar</button>
        <a href="{{ route('certificados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
    @else
    <div class="alert alert-danger mt-3">❌ No se encontró el certificado.</div>
    @endif
</div>
@endsection