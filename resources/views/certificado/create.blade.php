@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Nuevo Certificado</h1>

    <form action="{{ route('certificados.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="codigo_interno" class="form-label">Código Interno</label>
            <input type="text" name="codigo_interno" id="codigo_interno" class="form-control   @error('idcodigo_interno') is-invalid @enderror" required>
            @error('codigo_interno')
            <div class="nvalid-feedback">
                {{ $message}}
                @enderror
            </div>


            <div class="mb-3">
                <label for="codigo_qr" class="form-label">Código QR</label>
                <input type="text" name="codigo_qr" id="codigo_qr" class="form-control  @error('idcodigo_qr') is-invalid @enderror" required>
                @error('codigo_qr')
                <div class="nvalid-feedback">
                    {{ $message}}
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="fecha_emision" class="form-label">Fecha de Emisión</label>
                    <input type="date" name="fecha_emision" id="fecha_emision" class="form-control  @error('idfecha_emision') is-invalid @enderror" required>
                    @error('fecha_emision')
                    <div class="nvalid-feedback">
                        {{ $message}}
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
                        <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control  @error('idfecha_vencimiento') is-invalid @enderror" required>
                        @error('fecha_vencimiento')
                        <div class="nvalid-feedback">
                            {{ $message}}
                            @enderror
                        </div>



                        <div class="mb-3">
                            <label for="resgistro_supervigilancia" class="form-label">Registro Supervigilancia</label>
                            <input type="text" name="resgistro_supervigilancia" id="resgistro_supervigilancia" class="form-control   @error('idresgistro_supervigilancia') is-invalid @enderror" required>
                            @error('resgistro_supervigilancia')
                            <div class="nvalid-feedback">
                                {{ $message}}
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="alumno_id" class="form-label">Alumno</label>
                                <select name="alumno_id" id="alumno_id" class="form-control  @error('idalumno_id') is-invalid @enderror" required>
                                    @error('alumno_id')
                                    <div class="nvalid-feedback">
                                        {{ $message}}
                                        @enderror
                                    </div>
                                    <option value="">Seleccione un alumno</option>
                                    @foreach($alumnos as $alumno)
                                    <option value="{{ $alumno->id }}">{{ $alumno->nombres }} {{ $alumno->apellidos }}</option>
                                    @endforeach
                                </select>
                            </div>



                            <button type="submit" class="btn btn-success">Guardar</button>
                            <a href="{{ route('certificados.index') }}" class="btn btn-secondary">Cancelar</a>




    </form>
</div>



@endsection