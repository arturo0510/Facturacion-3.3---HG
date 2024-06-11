<?php

include_once '../configuraciones/bd.php';
$conexionBD=BD::crearInstancia();
$accion=isset($_POST['accion'])?$_POST['accion']:'';
// Obtener clientes
$consultaClientes = $conexionBD->prepare("SELECT * FROM clientes");
$consultaClientes->execute();
$clientes = $consultaClientes->fetchAll(PDO::FETCH_ASSOC);

// Obtener productos
$consultaProductos = $conexionBD->prepare("SELECT * FROM productos");
$consultaProductos->execute();
$productos = $consultaProductos->fetchAll(PDO::FETCH_ASSOC);

// Obtener facturas
$consultaFacturas = $conexionBD->prepare("
    SELECT f.id, c.nombre_cliente, c.RFC, f.total, f.fecha
    FROM Facturas f
    INNER JOIN Clientes c ON f.cliente_id = c.id
");
$consultaFacturas->execute();
$facturas = $consultaFacturas->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Manejar la creación de una nueva factura
    if (isset($_POST['cliente_id'])) {
        $cliente_id = $_POST['cliente_id'];
        $productosSeleccionados = $_POST['productos'];
        $fecha = date('Y-m-d');
        $totalFactura = 0;

        // Calcular el total de la factura y verificar si los productos seleccionados tienen cantidad
        $productosProcesados = [];
        foreach ($productosSeleccionados as $producto_id => $producto) {
            if (isset($producto['cantidad']) && $producto['cantidad'] > 0) {
                $cantidad = $producto['cantidad'];
                $precio = $producto['precio'];
                $totalProducto = $cantidad * $precio;
                $totalFactura += $totalProducto;
                $productosProcesados[$producto_id] = $producto;
            }
        }

        // Insertar la factura en la tabla Facturas
        $consultaFactura = $conexionBD->prepare("INSERT INTO facturas (cliente_id, fecha, total) VALUES (:cliente_id, :fecha, :total)");
        $consultaFactura->bindParam(':cliente_id', $cliente_id);
        $consultaFactura->bindParam(':fecha', $fecha);
        $consultaFactura->bindParam(':total', $totalFactura);
        $consultaFactura->execute();
        $factura_id = $conexionBD->lastInsertId();

        // Insertar los detalles de la factura en la tabla DetalleFactura
        foreach ($productosProcesados as $producto_id => $producto) {
            $cantidad = $producto['cantidad'];
            $precio = $producto['precio'];

            $consultaDetalle = $conexionBD->prepare("INSERT INTO detalle_factura (factura_id, producto_id, cantidad, precio) VALUES (:factura_id, :producto_id, :cantidad, :precio)");
            $consultaDetalle->bindParam(':factura_id', $factura_id);
            $consultaDetalle->bindParam(':producto_id', $producto_id);
            $consultaDetalle->bindParam(':cantidad', $cantidad);
            $consultaDetalle->bindParam(':precio', $precio);
            $consultaDetalle->execute();
        }

        // Redirigir después de procesar la solicitud POST para evitar duplicaciones
        header('Location: vista_facturas.php');
        exit();
    }

    // Manejar la eliminación de una factura
    if (isset($_POST['eliminar_factura_id'])) {
        $factura_id = $_POST['eliminar_factura_id'];

        // Eliminar detalles de la factura
        $consultaEliminarDetalle = $conexionBD->prepare("DELETE FROM detalle_factura WHERE factura_id = :factura_id");
        $consultaEliminarDetalle->bindParam(':factura_id', $factura_id);
        $consultaEliminarDetalle->execute();

        // Eliminar la factura
        $consultaEliminarFactura = $conexionBD->prepare("DELETE FROM facturas WHERE id = :factura_id");
        $consultaEliminarFactura->bindParam(':factura_id', $factura_id);
        $consultaEliminarFactura->execute();

        // Redirigir después de procesar la solicitud POST para evitar duplicaciones
        header('Location: vista_facturas.php');
        exit();
    }
}

?>