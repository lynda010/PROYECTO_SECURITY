@extends('adminlte::page')

@section('title', 'Título de tu Panel')

@section('content_header')
    <h1>Dashboard de Administración</h1>
@stop

@section('content')
    <p>Aquí va el contenido de tu página.</p>
@stop

{{-- Opcional: secciones para CSS y JS personalizado --}}
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop