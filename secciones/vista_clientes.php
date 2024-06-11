<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Clientes</title>
    <link rel="stylesheet" href="../secciones/styles.css">
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet" />
</head>
<body>
    <?php include('../templates/cabecera.php'); ?>
    <?php include('../secciones/clientes.php'); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <form action="" method="post" class="client-form">
                    <div class="card shadow-sm">
                        <div class="card-header primary-background text-white">Clientes</div>
                        <div class="card-body">
                            <div class="mb-3 d-none">
                                <label for="id" class="form-label">ID</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="id"
                                    id="id"
                                    value="<?php echo $id; ?>"
                                    placeholder="ID"
                                />
                            </div>
                            <div class="form-group">
                                <label for="nombre_cliente" class="form-label">Nombre</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="nombre_cliente"
                                    id="nombre_cliente"
                                    value="<?php echo $nombre_cliente; ?>"
                                    placeholder="Escriba el nombre"
                                />
                            </div>
                            <div class="form-group">
                                <label for="ap_paterno" class="form-label">Apellido Paterno</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="ap_paterno"
                                    id="ap_paterno"
                                    value="<?php echo $ap_paterno; ?>"
                                    placeholder="Escriba el apellido paterno"
                                />
                            </div>
                            <div class="form-group">
                                <label for="ap_materno" class="form-label">Apellido Materno</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="ap_materno"
                                    id="ap_materno"
                                    value="<?php echo $ap_materno; ?>"
                                    placeholder="Escriba el apellido materno"
                                />
                            </div>
                            <div class="form-group">
                                <label for="RFC" class="form-label">RFC</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="RFC"
                                    id="RFC"
                                    value="<?php echo $RFC; ?>"
                                    placeholder="Escriba el RFC"
                                />
                            </div>
                            <div class="form-group">
                                <label for="Regimen_fiscal" class="form-label">Regimen Fiscal</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="Regimen_fiscal"
                                    id="Regimen_fiscal"
                                    value="<?php echo $Regimen_fiscal; ?>"
                                    placeholder="Escriba el Regimen Fiscal"
                                />
                            </div>
                            <div class="form-group">
                                <label for="domicilio" class="form-label">Domicilio</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="domicilio"
                                    id="domicilio"
                                    value="<?php echo $domicilio; ?>"
                                    placeholder="Escriba el domicilio"
                                />
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

            <div class="col-md-8">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="primary-background text-white">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido Paterno</th>
                                <th>RFC</th>
                                <th>Regimen fiscal</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($clientes as $cliente): ?>
                            <tr>
                                <td><?php echo $cliente['id'];?></td>
                                <td><?php echo $cliente['nombre_cliente'];?></td>
                                <td><?php echo $cliente['ap_paterno'];?></td>
                                <td><?php echo $cliente['RFC'];?></td>
                                <td><?php echo $cliente['Regimen_fiscal'];?></td>
                                <td>
                                <form action="" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo $cliente['id']; ?>">
                                    <input type="submit" value="Seleccionar" name="accion" class="btn btn-success">
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

    <?php include('../templates/pie.php'); ?>

    <!-- Enlace a Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>



