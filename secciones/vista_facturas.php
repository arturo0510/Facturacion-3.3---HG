<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generar Facturas</title>
    <link rel="stylesheet" href="../secciones/styles.css">
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet" />
</head>
<body>
    <?php include('../templates/cabecera.php'); ?>
    <?php include('../secciones/facturas.php'); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5">
                <form action="" method="post" class="invoice-form">
                    <div class="card shadow-sm">
                        <div class="card-header primary-background text-white">Facturación</div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="cliente_id" class="form-label">Clientes</label>
                                <select class="form-select form-select-lg" name="cliente_id" id="listaClientes" required>
                                    <option selected disabled>Seleccione una opción</option>
                                    <?php foreach ($clientes as $cliente): ?>
                                        <option value="<?php echo $cliente['id']; ?>"><?php echo $cliente['nombre_cliente']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="productos" class="form-label">Productos</label>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Seleccionar</th>
                                            <th>Producto</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($productos as $producto): ?>
                                            <tr>
                                                <td>
                                                    <input
                                                        type="checkbox"
                                                        name="productos[<?php echo $producto['id']; ?>][id]"
                                                        value="<?php echo $producto['id']; ?>"
                                                        onclick="toggleCantidad(this, 'cantidad_<?php echo $producto['id']; ?>')"
                                                    />
                                                </td>
                                                <td><?php echo htmlspecialchars($producto['nombre_producto']); ?></td>
                                                <td>$<?php echo htmlspecialchars($producto['precio']); ?></td>
                                                <td>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        name="productos[<?php echo $producto['id']; ?>][cantidad]"
                                                        id="cantidad_<?php echo $producto['id']; ?>"
                                                        placeholder="Cantidad"
                                                        min="0"
                                                        step="1"
                                                        disabled
                                                    />
                                                    <input
                                                        type="hidden"
                                                        name="productos[<?php echo $producto['id']; ?>][precio]"
                                                        value="<?php echo $producto['precio']; ?>"
                                                    />
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <div class="card-footer text-muted">
                            <button type="submit" class="btn btn-primary">Generar Factura</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-7">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="primary-background text-white">
                            <tr>
                                <th>ID Factura</th>
                                <th>Cliente</th>
                                <th>RFC</th>
                                <th>Importe Total</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($facturas as $factura): ?>
                                <tr>
                                    <td><?php echo $factura['id']; ?></td>
                                    <td><?php echo $factura['nombre_cliente']; ?></td>
                                    <td><?php echo $factura['RFC']; ?></td>
                                    <td>$<?php echo $factura['total']; ?></td>
                                    <td><?php echo $factura['fecha']; ?></td>
                                    <td>
                                        <a href="factura_pdf.php?id=<?php echo $factura['id']; ?>" class="btn btn-success">Descargar</a>
                                        <form action="" method="post" style="display:inline;">
                                            <input type="hidden" name="eliminar_factura_id" value="<?php echo $factura['id']; ?>">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta factura?');">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
    function toggleCantidad(checkbox, cantidadId) {
        var cantidadInput = document.getElementById(cantidadId);
        if (checkbox.checked) {
            cantidadInput.disabled = false;
            cantidadInput.focus();
        } else {
            cantidadInput.disabled = true;
            cantidadInput.value = '';
        }
    }
    </script>

    <?php include('../templates/pie.php'); ?>

    <!-- Enlace a Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
