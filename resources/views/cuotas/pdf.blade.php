<!DOCTYPE html>
<html>
<head>
    <title>Detalles de la Cuota</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Detalles de la Cuota</h2>
    <table>
        <tr>
            <th>ID</th>
            <td>{{ $cuota->id_cuota }}</td>
        </tr>
        <tr>
            <th>Cliente</th>
            <td>{{ $cuota->cliente->nombre }}</td>
        </tr>
        <tr>
            <th>Concepto</th>
            <td>{{ $cuota->concepto }}</td>
        </tr>
        <tr>
            <th>Fecha Emisión</th>
            <td>{{ $cuota->fecha_emision }}</td>
        </tr>
        <tr>
            <th>Importe</th>
            <td>{{ $cuota->importe }}</td>
        </tr>
        <tr>
            <th>Pagada</th>
            <td>{{ $cuota->pagada == 'S' ? 'Sí' : 'No' }}</td>
        </tr>
        <tr>
            <th>Fecha de Pago</th>
            <td>{{ $cuota->fecha_pago }}</td>
        </tr>
        <tr>
            <th>Notas</th>
            <td>{{ $cuota->notas }}</td>
        </tr>
    </table>
</body>
</html>