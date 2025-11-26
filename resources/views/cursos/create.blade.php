@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Nuevo Curso</h1>

    <form action="{{ route('cursos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre_curso" class="form-label">Nombre del Curso</label>
            <input type="text" name="nombre_curso" id="nombre_curso" class="form-control form-control form-control  @error('idnombre_curso') is-invalid @enderror" required>
            @error('nombre_curso')
            <div class="nvalid-feedback">
                {{ $message}}
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor ($)</label>
            <input type="number" name="valor" id="valor" class="form-control form-control form-control  @error('idvalor') is-invalid @enderror" step="0.01" required>
            @error('valor')
            <div class="nvalid-feedback">
                {{$message }}
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="duracion_horas" class="form-label">Duración (horas)</label>
            <input type="number" name="duracion_horas" id="duracion_horas" class="form-control form-control form-control  @error('idDuración') is-invalid @enderror" required>
            @error('duracion_horas')
            <div class="nvalid-feedback">
                {{ $message}}
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="duracion_dias_presencial" class="form-label">Duración (días presenciales)</label>
            <input type="number" name="duracion_dias_presencial" id="duracion_dias_presencial" class="form-control form-control form-control  @error('idduracion_dias_presencial') is-invalid @enderror" required>
            @error('duracion_dias_presencial')
            <div class="nvalid-feedback">
                {{ $message}}
                @enderror
            </div>
        </div>

        

        <div class="mb-3"> 
            <label for="tipo_curso_id" class="form-label">Tipo de Curso</label> 
        <select name="tipo_curso_id" id="tipo_curso_id" class="form-control form-control form-control  @error('idtipo_curso_id') is-invalid @enderror">
        @error('tipo_curso_id')
            <div class="nvalid-feedback">
                {{ $message}}
                @enderror
            </div>
            @foreach($tiposCurso as $item)
            <option value="{{$item->id}}">{{$item->nombre_tipo}}</option>
            @endforeach


        </select>

    </div>

</div>
<button type="submit" class="btn btn-success">Guardar</button>

<a href="{{ route('cursos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>

<a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection