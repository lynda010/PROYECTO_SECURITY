@extends('layouts.app')

@section('title', 'Security Academy')

@section('titleContent')

<div class="text-center mb-4">
    <h1 class="fw-bold text-white">BIENVENIDOS AL SISTEMA DE GESTION SECURITY ACADEMY</h1>

    <img src="{{ asset('images/logo.png') }}"
        alt="Logo"
        style="width: 180px;               /* tamaño más grande */
            float: left;               /* al lado izquierdo */
            margin-right: 20px;        /* separación del texto */
            border: 3px solid #2E7D32; /* borde verde profesional */
            padding: 5px;              /* espacio interno */
            border-radius: 10px;       /* bordes redondeados */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* sombra sutil */">

</div>
@endsection

@section('Content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    
    body,
    .content-wrapper {
        background-color: #2f6d46 !important;
        color: #fff;
        font-family: 'Poppins', sans-serif;
    }

    .card {
        border: none;
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: rgba(255, 255, 255, 0.10);
        backdrop-filter: blur(4px);
        color: #fff;
        text-align: center;
        height: 100%;
        padding-top: 15px;

        /* 👉 Espacio inferior para separarlas */
        margin-bottom: 30px;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.25);
    }

    .icon-container {
        font-size: 40px;
        margin-bottom: 15px;
    }
    .btn-ver {
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        color: #fff;
        background-color: #28a745;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }


    /* Espaciado vertical entre filas */
    .row.g-4 {
        row-gap: 35px !important;
    }
</style>

<div class="container py-4">
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">

        <div class="col">
            <div class="card tipo-curso h-100">
                <div class="card-body text-center">
                    <div class="icon-container"><i class="fas fa-file-alt"></i></div>
                    <h5 class="fw-bold text-white">Tipo De Curso</h5>
                    <p>Administra los tipos de cursos disponibles en el sistema.</p>
                    <a href="{{ route('tipo_cursos.index') }}" class="btn-ver">Ver</a>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="card alumno h-100">
                <div class="card-body text-center">
                    <div class="icon-container"><i class="fas fa-user-graduate"></i></div>
                    <h5 class="fw-bold text-white">Alumno</h5>
                    <p>Gestiona la información de los alumnos registrados.</p>
                    <a href="{{ route('alumnos.index') }}" class="btn-ver">Ver</a>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="card certificado h-100">
                <div class="card-body text-center">
                    <div class="icon-container"><i class="fas fa-award"></i></div>
                    <h5 class="fw-bold text-white">Certificado</h5>
                    <p>Revisa y administra los certificados de los alumnos.</p>
                    <a href="{{ route('certificados.index') }}" class="btn-ver">Ver</a>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="card curso h-100">
                <div class="card-body text-center">
                    <div class="icon-container"><i class="fas fa-chalkboard-teacher"></i></div>
                    <h5 class="fw-bold text-white">Curso</h5>
                    <p>Gestiona el catálogo de cursos disponibles para los alumnos.</p>
                    <a href="{{ route('cursos.index') }}" class="btn-ver">Ver</a>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="card modulo h-100">
                <div class="card-body text-center">
                    <div class="icon-container"><i class="fas fa-layer-group"></i></div>
                    <h5 class="fw-bold text-white">Módulo</h5>
                    <p>Administra los módulos que componen cada curso.</p>
                    <a href="{{ route('modulos.index') }}" class="btn-ver">Ver</a>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="card alumno-modulo h-100">
                <div class="card-body text-center">
                    <div class="icon-container"><i class="fas fa-tasks"></i></div>
                    <h5 class="fw-bold text-white">Alumno Completa Módulo</h5>
                    <p>Registra el progreso de los alumnos en cada módulo.</p>
                    <a href="{{ route('alumno_completa_modulos.index') }}" class="btn-ver">Ver</a>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="card pago h-100">
                <div class="card-body text-center">
                    <div class="icon-container"><i class="fas fa-money-bill-wave"></i></div>
                    <h5 class="fw-bold text-white">Pago</h5>
                    <p>Administra los pagos realizados por los alumnos.</p>
                    <a href="{{ route('pagos.index') }}" class="btn-ver">Ver</a>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="card alumno-curso h-100">
                <div class="card-body text-center">
                    <div class="icon-container"><i class="fas fa-users"></i></div>
                    <h5 class="fw-bold text-white">Alumno Toma Curso</h5>
                    <p>Gestiona los cursos que los alumnos están tomando actualmente.</p>
                    <a href="{{ route('alumno_toma_cursos.index') }}" class="btn-ver">Ver</a>

                </div>
            </div>
        </div>

        <div class="col">
            <div class="card grupos h-100">
                <div class="card-body text-center">
                    <div class="icon-container"><i class="fas fa-users"></i></div>
                    <h5 class="fw-bold text-white">Grupos</h5>
                    <p>Gestiona grupos de formación en la academia.</p>
                    <a href="{{ route('grupos.index') }}" class="btn-ver">Ver</a>

                </div>
            </div>
        </div>

    </div>
</div>

@endsection