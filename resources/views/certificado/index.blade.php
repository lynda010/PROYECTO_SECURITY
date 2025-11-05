@extends('layouts.app')

@section('Content')
<div class="container">
    <h1>Lista de Certificados</h1>

    <a href="{{ route('certificados.create') }}" class="btn btn-primary mb-3">Nuevo Certificado</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Código Interno</th>
                <th>Código QR</th>
                <th>Fecha Emisión</th>
                <th>Fecha Vencimiento</th>
                <th>Registro Supervigilancia</th>
                <th>Alumno</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($certificados as $certificado)
            <tr>
                <td>{{ $certificado->codigo_interno }}</td>
                <td>{{ $certificado->codigo_qr }}</td>
                <td>{{ $certificado->fecha_emision }}</td>
                <td>{{ $certificado->fecha_vencimiento }}</td>
                <td>{{ $certificado->resgistro_supervigilancia }}</td>
                <td>{{ $certificado->alumno->nombres }} {{ $certificado->alumno->apellidos }}</td>
                <td>
                    <a href="{{ route('certificados.edit', $certificado->codigo_interno) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('certificados.destroy', $certificado->codigo_interno) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection