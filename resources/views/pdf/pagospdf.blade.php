<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte General de Pagos</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        h1 { text-align: center; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #999; padding: 6px; text-align: left; }
        .header { text-align: center; margin-bottom: 20px; }
    </style>
</head>

<body>

    <div class="header">
        <img src="{{ public_path('images/logo.png') }}" alt="Logo"
                style="height: 60px; width: 60px; margin-right: 10px;">
        <h1>REPORTE GENERAL DE PAGOS</h1>
        <p><strong>Fecha de generación:</strong> 
            {{ \Carbon\Carbon::now()->locale('es')->translatedFormat('d \d\e F \d\e Y – H:i') }}
        </p>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID Pago</th>
                <th>Alumno</th>
                <th>Curso</th>
                <th>Fecha de Pago</th>
                <th>Monto</th>
                <th>Método</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pagos as $pago)
            <tr>
                <td>{{ $pago->id }}</td>
                <td>{{ $pago->alumno->nombres }} {{ $pago->alumno->apellidos }}</td>
                <td>{{ $pago->curso->nombre_curso }}</td>
                <td>{{ $pago->fecha_pago }}</td>
                <td>${{ number_format($pago->monto, 2) }}</td>
                <td>{{ $pago->metodo_pago }}</td>
                <td>{{ $pago->estado_pago }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
