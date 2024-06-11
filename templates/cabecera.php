<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header('Location:../index.php');
}
?>


<!doctype html>
<html lang="es">
<head>
    <title>Título</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- Bootstrap Icons CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet" />

    <!-- Enlace a tu archivo CSS personalizado -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand text-success" href="index.php">
            <i class="bi bi-bootstrap"></i> StratManage360
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-dark" href="index.php">
                        <i class="bi bi-house"></i> Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="vista_facturas.php">
                        <i class="bi bi-file-earmark-text"></i> Facturación
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="vista_clientes.php">
                        <i class="bi bi-people"></i> Clientes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="vista_productos.php">
                        <i class="bi bi-box-seam"></i> Productos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark" href="cerrar.php">
                        <i class="bi bi-box-arrow-right"></i> Cerrar sesión
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>



    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                
                <div class="row">
                    <!-- Contenido adicional aquí -->
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS v5.3.2 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+4l5L24E5JJKv8UzS5B8ctyJpSljN" crossorigin="anonymous"></script>
</body>
</html>
