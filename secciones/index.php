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
    <!-- Animaciones y carrusel de imágenes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
</head>
<body>

<?php include('../templates/cabecera.php'); ?>

<div class="jumbotron jumbotron-fluid bg-light">
    <div class="container">
        <h1 class="display-3">Bienvenido a la aplicación de Facturación</h1>
        <p class="lead">El sistema de facturación más fácil de usar.</p>
        <hr class="my-4">
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="vista_facturas.php" role="button">Iniciar</a>
        </p>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h2 class="mt-5 mb-3">¿Qué ofrece nuestra aplicación?</h2>
            <ul>
                <li>Facilidad de uso</li>
                <li>Gestión de productos</li>
                <li>Administración de clientes</li>
                <li>Facturación rápida</li>
                <li>Informes detallados</li>
            </ul>
        </div>
        <div class="col-md-7">
            <div class="slick-carousel mt-5">
                <div><img src="../src/productos.png" alt="Productos" class="img-fluid"></div>
                <div><img src="../src/clientes.png" alt="Clientes" class="img-fluid"></div>
                <div><img src="../src/facturas.png" alt="Facturación" class="img-fluid"></div>
            </div>
        </div>
    </div>
</div>

<?php include('../templates/pie.php'); ?>

<!-- Scripts adicionales para animaciones y carrusel de imágenes -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
    $(document).ready(function(){
        $('.slick-carousel').slick({
            autoplay: true,
            autoplaySpeed: 2000,
            dots: true,
            arrows: false,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear'
        });
    });
</script>

</body>
</html>








