@extends('adminlte::page')

@section('title', $title ?? 'Dashboard')

@section('content_header')
<header style="text-align: left; padding: 15px 30px; font-size: 1.5rem;">
    @yield('titleContent', 'Panel de Administración')
</header>
@stop

@section('content')
<main class="flex-fill">
    <div class="container py-4">
        <div class="row">
            @yield('Content')
        </div>
    </div>
</main>
@stop

@section('css')
{{-- Bootstrap CSS --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
    crossorigin="anonymous">

{{-- Estilos personalizados --}}
<style>
    body {
        background: #e0f7fa;
        /* azul claro */
        color: #004d40;
        /* verde oscuro */
        min-height: 100vh;
        display: flex;
        flex-direction: column;
    }

    footer {
        background-color: #b2dfdb;
        /* verde claro */
        color: #004d40;
        padding: 10px 0;
        text-align: center;
        margin-top: auto;
    }

    .card {
        background-color: #ffffff;
        border-radius: 10px;
    }

    .card-title {
        color: #00796b;
        /* verde oscuro */
    }

    .btn-primary {
        background-color: #4fc3f7;
        /* azul claro */
        border-color: #4fc3f7;
    }

    .btn-primary:hover {
        background-color: #29b6f6;
        border-color: #29b6f6;
    }

    .container {
        padding-top: 20px;
        padding-bottom: 20px;
    }
</style>

{{-- CSS propio del AdminLTE --}}
<link rel="stylesheet" href="{{ asset('css/admin-custom.css') }}">
@stack('styles')
@stop

@section('js')
{{-- Bootstrap JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>

@stack('scripts')
@stop

@section('footer')
<footer>
    © {{ date('Y') }} Todos los derechos reservados
</footer>
@stop