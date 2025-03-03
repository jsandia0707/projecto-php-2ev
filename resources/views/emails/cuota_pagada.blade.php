<!DOCTYPE html>
<html>
<head>
    <title>Confirmación de Pago de Cuota</title>
</head>
<body>
    <p>Estimado {{ $cuota->cliente->nombre }},</p>
    <p>Su cuota con concepto "{{ $cuota->concepto }}" ha sido marcada como pagada el {{ $cuota->fecha_pago }}.</p>
    <p>Adjunto encontrará el recibo de pago en formato PDF.</p>
    <p>Gracias por su pago.</p>
    <p>Atentamente,<br>nosecaen,S.L.</p>
</body>
</html>