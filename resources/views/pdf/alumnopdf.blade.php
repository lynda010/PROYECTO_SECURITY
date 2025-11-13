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

        h1, h3 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #999;
            padding: 6px;
            text-align: left;
        }

        .text-center { text-align: center; }
        .text-right { text-align: right; }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo {
            width: 80px;
            margin-bottom: 10px;
        }

        .summary {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <!-- ENCABEZADO -->
    <div class="header">
        <div style="display: flex; align-items: center; justify-content: center;">
            <img src="{{ public_path('images/logo.png') }}" alt="Logo" style="height: 100px; width: 100px; margin-right: 10px;">
            <h1 style="margin: 0;">SISTEMA SECURITY ACADEMY</h1>
        </div>
        <p><strong>Reporte de Alumnos Matriculados</strong></p>
        <p><strong>Fecha de generación:</strong> {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }}</p>
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
            <tr>
                <th>ID</th>
                <th>Tipo Documento</th>
                <th>Número Documento</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Fecha Nacimiento</th>
                <th>Género</th>
                <th>EPS</th>
                <th>Correo Electrónico</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Usuario Plataforma</th>
                <th>Contraseña Plataforma</th>
                <th>Situación Militar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumnos as $alumno)
            <tr>
                <td>{{ $alumno->id }}</td>
                <td>{{ $alumno->tipo_documento }}</td>
                <td>{{ $alumno->numero_documento }}</td>
                <td>{{ $alumno->nombres }}</td>
                <td>{{ $alumno->apellidos }}</td>
                <td>{{ $alumno->fecha_nacimiento }}</td>
                <td>{{ $alumno->genero }}</td>
                <td>{{ $alumno->eps }}</td>
                <td>{{ $alumno->correo_electronico }}</td>
                <td>{{ $alumno->telefono }}</td>
                <td>{{ $alumno->direccion }}</td>
                <td>{{ $alumno->usuario_plataforma }}</td>
                <td>{{ $alumno->contrasena_plataforma }}</td>
                <td>{{ $alumno->situacion_militar_definida }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- PIE -->
    <div style="margin-top: 30px; text-align: center; font-size: 10px; color: #666;">
        <p>Reporte generado el {{ \Carbon\Carbon::now()->format('d/m/Y H:i') }} por Sistema Security Academy</p>
    </div>
</body>
</html>
