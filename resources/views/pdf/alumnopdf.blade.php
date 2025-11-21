<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Alumnos Matriculados</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        h1,
        h3 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th,
        td {
            border: 1px solid #999;
            padding: 6px;
            text-align: left;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <!-- ENCABEZADO -->
    <div class="header">
        <div style="display: flex; justify-content: center; align-items: center;">
            <img src="{{ public_path('images/logo.png') }}" alt="Logo"
                style="height: 60px; width: 60px; margin-right: 10px;">
            <h1 style="margin: 0;">SISTEMA SECURITY ACADEMY</h1>
        </div>

        <p><strong>Reporte de Alumnos Matriculados</strong></p>
        <p><strong>Fecha de generación:</strong>
    {{ \Carbon\Carbon::now()->locale('es')->translatedFormat('d \d\e F \d\e Y – H:i') }}
</p>

    </div>

    <!-- RESUMEN -->
    <table style="width: 100%; border: none; margin-bottom: 20px;">
        <tr>
            <td style="border: none;"><strong>Total de Alumnos:</strong> {{ $alumnos->count() }}</td>
        </tr>
    </table>

    <!-- DETALLE -->
    <h3>Listado de Alumnos</h3>

    <table>
        <thead>
                <th>Tipo Documento</th>
                <th>Número Documento</th>
                <th>Nombres Completo</th>
                <th>Fecha Nacimiento</th>
                <th>Género</th>
                <th>EPS</th>
                <th>Correo Electrónico</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Situación Militar</th>
            </tr>
        </thead>

        <tbody>
            @foreach($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->tipo_documento }}</td>
                <td>{{ $alumno->numero_documento }}</td>
                <td>{{ $alumno->nombres }} - {{ $alumno->apellidos }}</td>
                <td>{{ $alumno->fecha_nacimiento }}</td>
                <td>{{ $alumno->genero }}</td>
                <td>{{ $alumno->eps }}</td>
                <td>{{ $alumno->correo_electronico }}</td>
                <td>{{ $alumno->telefono }}</td>
                <td>{{ $alumno->direccion }}</td>
                <td>{{ $alumno->situacion_militar_definida }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- PIE -->
    <div style="margin-top: 20px; text-align: center; font-size: 10px; color: #666;">
        <p>Reporte generado el {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }} por Security Academy</p>
    </div>

</body>

</html>