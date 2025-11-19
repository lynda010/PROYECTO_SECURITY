@extends('adminlte::page')

@section('title', $title ?? 'Dashboard')


{{-- #################################### --}}
{{-- CSS                  --}}
{{-- #################################### --}}
@section('css')

<!-- DataTables CSS -->
<link rel="stylesheet"
    href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">


<!-- Estilos personalizados -->
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
    }

    .btn-primary {
        background-color: #4fc3f7;
        border-color: #4fc3f7;
    }

    .btn-primary:hover {
        background-color: #29b6f6;
        border-color: #29b6f6;
    }
</style>

<link rel="stylesheet" href="{{ asset('css/admin-custom.css') }}">
@endsection


{{-- #################################### --}}
{{-- CONTENT HEADER            --}}
{{-- #################################### --}}
@section('content_header')
<header style="text-align: left; padding: 15px 30px; font-size: 1.5rem;">
    @yield('titleContent', 'Panel de Administración')
</header>
@stop


{{-- #################################### --}}
{{-- CONTENT               --}}
{{-- #################################### --}}
@section('content')
<main class="flex-fill">
    <div class="container py-4">
        <div class="row">
            @yield('Content')
        </div>
    </div>
</main>
@stop


{{-- #################################### --}}
{{-- JS                  --}}
{{-- #################################### --}}
@section('js')

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>


<!-- Exportadores -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>



{{-- Scripts individuales de cada vista (tu DataTable, filtros, etc.) --}}
@yield('scripts')

@stop


{{-- #################################### --}}
{{-- FOOTER               --}}
{{-- #################################### --}}
@section('footer')
<footer>
    © {{ date('Y') }} Todos los derechos reservados
</footer>
@stop