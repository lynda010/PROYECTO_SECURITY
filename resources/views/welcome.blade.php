@extends('layouts.app')

@section('title')
Dashboard
@endsection

@section('titleContent')
Página Principal
@endsection

@section('Content')
<div class="row g-4">

    <div class="col-md-3">
        <div class="card shadow-sm text-center h-100">
            <div class="card-body">
                <h5 class="card-title">Tipo De Curso</h5>
                <p class="card-text">Administra los tipos de cursos disponibles en el sistema.</p>
                <a href="{{ route('tipo_cursos.index') }}" class="btn btn-primary">Ver Tipos de Curso</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm text-center h-100">
            <div class="card-body">
                <h5 class="card-title">Alumno</h5>
                <p class="card-text">Gestiona la información de los alumnos registrados.</p>
                <a href="{{ route('alumnos.index') }}" class="btn btn-primary">Ver Alumnos</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm text-center h-100">
            <div class="card-body">
                <h5 class="card-title">Certificado</h5>
                <p class="card-text">Revisa y administra los certificados de los alumnos.</p>
                <a href="{{ route('certificados.index') }}" class="btn btn-primary">Ver Certificados</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm text-center h-100">
            <div class="card-body">
                <h5 class="card-title">Curso</h5>
                <p class="card-text">Gestiona el catálogo de cursos disponibles para los alumnos.</p>
                <a href="{{ route('cursos.index') }}" class="btn btn-primary">Ver Cursos</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm text-center h-100">
            <div class="card-body">
                <h5 class="card-title">Modulo</h5>
                <p class="card-text">Administra los módulos que componen cada curso.</p>
                <a href="{{ route('modulos.index') }}" class="btn btn-primary">Ver Módulos</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm text-center h-100">
            <div class="card-body">
                <h5 class="card-title">Alumno Completa Modulo</h5>
                <p class="card-text">Registra el progreso de los alumnos en cada módulo.</p>
                <a href="{{ route('alumno_completa_modulos.index') }}" class="btn btn-primary">Ver Progreso</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm text-center h-100">
            <div class="card-body">
                <h5 class="card-title">Pago</h5>
                <p class="card-text">Administra los pagos realizados por los alumnos.</p>
                <a href="{{ route('pagos.index') }}" class="btn btn-primary">Ver Pagos</a>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm text-center h-100">
            <div class="card-body">
                <h5 class="card-title">Alumno Toma Curso</h5>
                <p class="card-text">Gestiona los cursos que los alumnos están tomando actualmente.</p>
                <a href="{{ route('alumno_toma_cursos.index') }}" class="btn btn-primary">Ver Cursos Tomados</a>
            </div>
        </div>
    </div>

</div>
@endsection
