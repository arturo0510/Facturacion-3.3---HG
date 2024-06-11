<?php
require_once '../librerias/dompdf/autoload.inc.php'; // Incluir el autoload de Dompdf
use Dompdf\Dompdf;

include_once '../configuraciones/bd.php';
$conexionBD=BD::crearInstancia();

// Verificar que se ha pasado el ID de la factura como parámetro
if (!isset($_GET['id'])) {
    die('No se ha especificado una factura.');
}

$factura_id = $_GET['id'];

// Datos del emisor (empresa)
$nombre_emisor = "StratManage360";
$domicilio_emisor = "Facultad de Ingenieria";
$telefono_emisor = "123-456-7890";
$correo_emisor = "StratManage360@empresa.com";

// Consultar los datos de la factura
$consultaFactura = $conexionBD->prepare("
    SELECT c.nombre_cliente, c.ap_paterno, c.ap_materno, c.RFC, c.Regimen_fiscal, c.domicilio, f.total, f.fecha
    FROM facturas f
    INNER JOIN clientes c ON f.cliente_id = c.id
    WHERE f.id = :factura_id
");

$consultaFactura->bindParam(':factura_id', $factura_id);
$consultaFactura->execute();
$factura = $consultaFactura->fetch(PDO::FETCH_ASSOC);

if (!$factura) {
    die('Factura no encontrada.');
}

// Consultar los detalles de la factura
$consultaDetalles = $conexionBD->prepare("
    SELECT df.cantidad, df.precio, p.nombre_producto, p.descripcion
    FROM detalle_factura df
    INNER JOIN productos p ON df.producto_id = p.id
    WHERE df.factura_id = :factura_id
");

$consultaDetalles->bindParam(':factura_id', $factura_id);
$consultaDetalles->execute();
$detalles = $consultaDetalles->fetchAll(PDO::FETCH_ASSOC);

// Calcular subtotal
$subtotal = 0;
foreach ($detalles as $detalle) {
    $subtotal += $detalle['cantidad'] * $detalle['precio'];
}

// Calcular IVA (asumimos un IVA del 16%)
$iva = $subtotal * 0.16;

// Calcular total
$total = $subtotal + $iva;

// Crear instancia de Dompdf
$dompdf = new Dompdf();

// Construir el HTML de la factura
$html = '
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
    }
    .header {
        text-align: center;
    }
    .footer {
        text-align: center;
        margin-top: 20px;
        font-size: 10px;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    th, td {
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #ddd;
    }
    .total {
        float: right;
        margin-top: 20px;
    }
    .datos {
        border: none;
        width: 100%;
    }
    .datos td:nth-child(1) {
        text-align: left;
    }
    .datos td:nth-child(2) {
        text-align: right;
    }
</style>
</head>
<body>
<div class="header">
    <div class="logo">
        <img src="../src/logo.png" alt=".">
    </div>
    <h1>Factura</h1>
</div>
<table class="datos">
    <tr>
        <td><strong>Datos del Cliente</strong></td>
        <td><strong>Datos del Emisor</strong></td>
    </tr>
    <tr>
        <td>
            <p>Nombre: ' . $factura['nombre_cliente'] . '</p>
            <p>Apellido Paterno: ' . $factura['ap_paterno'] . '</p>
            <p>Apellido Materno: ' . $factura['ap_materno'] . '</p>
            <p>RFC: ' . $factura['RFC'] . '</p>
            <p>Regimen Fiscal: ' . $factura['Regimen_fiscal'] . '</p>
            <p>Domicilio: ' . $factura['domicilio'] . '</p>
            <p>Fecha: ' . $factura['fecha'] . '</p>
        </td>
        <td>
            <p>Nombre: ' . $nombre_emisor . '</p>
            <p>Domicilio: ' . $domicilio_emisor . '</p>
            <p>Teléfono: ' . $telefono_emisor . '</p>
            <p>Correo: ' . $correo_emisor . '</p>
        </td>
    </tr>
</table>
<table>
    <tr>
        <th>Cantidad</th>
        <th>Producto</th>
        <th>Descripción</th> <!-- Se agregó la columna de Descripción -->
        <th>Precio Unitario</th>
        <th>Total</th>
    </tr>';
foreach ($detalles as $detalle) {
    $html .= '
    <tr>
        <td>' . $detalle['cantidad'] . '</td>
        <td>' . $detalle['nombre_producto'] . '</td>
        <td>' . $detalle['descripcion'] . '</td> <!-- Se agregó la columna de Descripción -->
        <td>$' . number_format($detalle['precio'], 2) . '</td>
        <td>$' . number_format($detalle['cantidad'] * $detalle['precio'], 2) . '</td>
    </tr>';
}
$html .= '
</table>
<div class="total">
    <p><strong>Subtotal: $' . number_format($subtotal, 2) . '</strong></p>
    <p><strong>IVA (16%): $' . number_format($iva, 2) . '</strong></p>
    <p><strong>Total de la Factura: $' . number_format($total, 2) . '</strong></p>
</div>
<div class="footer">
    <p>Contacto: info@empresa.com | Teléfono: 123-456-7890</p>
    <p>Términos y Condiciones</p>
</div>
</body>
</html>';

// Cargar el HTML en Dompdf
$dompdf->loadHtml($html);

// (Opcional) Configurar opciones de Dompdf
$dompdf->setPaper('A4', 'portrait');

// Renderizar el HTML
$dompdf->render();

// Generar y mostrar el PDF
$dompdf->stream('factura.pdf', array('Attachment' => 0));
?>
