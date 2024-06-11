<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <link rel="stylesheet" href="../secciones/styles.css">
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet" />
</head>
<body>
    <?php include('../templates/cabecera.php'); ?>
    <?php include('../secciones/productos.php'); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-5">
                <form action="" method="post" class="product-form">
                    <div class="card shadow-sm">
                        <div class="card-header primary-background text-white">Producto</div>
                        <div class="card-body">
                            <div class="mb-3 d-none">
                                <label for="id" class="form-label">ID</label>
                                <input type="text" class="form-control" name="id" id="id" value="<?php echo $id; ?>" placeholder="ID">
                            </div>

                            <div class="form-group">
                                <label for="nombre_producto" class="form-label">Nombre del producto</label>
                                <input type="text" class="form-control" name="nombre_producto" id="nombre_producto" value="<?php echo $nombre_producto; ?>" placeholder="Nombre del producto">
                            </div>

                            <div class="form-group">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $descripcion; ?>" placeholder="Descripción">
                            </div>

                            <div class="form-group">
                                <label for="precio" class="form-label">Precio</label>
                                <input type="text" class="form-control" name="precio" id="precio" value="<?php echo $precio; ?>" placeholder="Precio">
                            </div>

                            <div class="button-group">
                                <button type="submit" name="accion" value="agregar" class="btn btn-primary">Agregar</button>
                                <button type="submit" name="accion" value="editar" class="btn btn-secondary">Editar</button>
                                <button type="submit" name="accion" value="borrar" class="btn btn-danger">Borrar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-7">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="primary-background text-white">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listaProductos as $producto) { ?>
                                <tr>
                                    <td><?php echo $producto['id']; ?></td>
                                    <td><?php echo $producto['nombre_producto']; ?></td>
                                    <td><?php echo $producto['descripcion']; ?></td>
                                    <td>$<?php echo $producto['precio']; ?></td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
                                            <input type="submit" value="Seleccionar" name="accion" class="btn btn-success">
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include('../templates/pie.php'); ?>

    <!-- Enlace a Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

