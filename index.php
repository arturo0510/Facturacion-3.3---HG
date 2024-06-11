<?php
session_start();
if ($_POST) {
    $mensaje = 'Usuario o contraseña incorrectos';

    if ($_POST['usuario'] == 'admin' && $_POST['password'] == 'admin') {
        $_SESSION['usuario'] = $_POST['usuario'];
        header('Location: secciones/index.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/css/all.min.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('img/logo.png'); /* Ruta del archivo de fondo */
            background-size: cover;
            background-position: center;
        }
        .contenedor {
            width: 100vw;
            height: 100vh;
            display: grid;
            grid-template-columns: 1fr;
            grid-gap: 7rem;
            padding: 0 2rem;
            justify-content: center;
            align-items: center;
        }
        .contenido-login {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }
        form {
            width: 360px;
        }
        .contenido-login h2 {
            margin: 15px 0;
            color: #333;
            text-transform: uppercase;
            font-size: 2.9rem;
        }
        .contenido-login .input-div {
            position: relative;
            display: grid;
            grid-template-columns: 7% 93%;
            margin: 25px 0;
            padding: 5px 0;
            border-bottom: 2px solid #d4bebe;
        }
        .contenido-login .input-div.dni {
            margin-top: 0;
        }
        .i {
            color: #d4bebe;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .i i {
            transition: .3s;
        }
        .input-div > div {
            position: relative;
            height: 45px;
        }
        .input-div > div > h5 {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #999999;
            font-size: 18px;
            transition: .3s;
            pointer-events: none;
        }
        .input-div > div > input {
            width: 100%;
            height: 100%;
            border: none;
            outline: none;
            background: none;
            padding: 0.5rem 0.7rem;
            font-size: 1.2rem;
            color: #555;
            font-family: 'Poppins', sans-serif;
        }
        .input-div > div > input:focus + h5,
        .input-div > div > input:not(:placeholder-shown) + h5 {
            top: -5px;
            font-size: 15px;
            color: #d4bebe;
        }
        .input-div:before,
        .input-div:after {
            content: '';
            position: absolute;
            bottom: -2px;
            width: 0%;
            height: 2px;
            background-color: blueviolet;
            transition: .4s;
        }
        .input-div::before {
            right: 50%;
        }
        .input-div::after {
            left: 50%;
        }
        .input-div.focus:before,
        .input-div.focus:after {
            width: 50%;
        }
        .input-div.focus > .i > i {
            color: blueviolet;
        }
        .input-div.pass {
            margin-bottom: 4px;
        }
        .btn {
            display: block;
            width: 100%;
            height: 50px;
            border-radius: 25px;
            outline: none;
            border: none;
            background-image: linear-gradient(to right, #680197, #00ffbf, #c046f8);
            background-size: 200%;
            font-size: 1.2rem;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            text-transform: uppercase;
            margin: 1rem 0;
            cursor: pointer;
            transition: .5s;
        }
        .btn:hover {
            background-position: right;
        }
        @media screen and (max-width: 1050px) {
            .contenedor {
                grid-gap: 5rem;
            }
        }
        @media screen and (max-width: 1000px) {
            form {
                width: 290px;
            }
            .contenido-login h2 {
                font-size: 2.4rem;
                margin: 8px 0;
            }
        }
        @media screen and (max-width: 900px) {
            .contenedor {
                grid-template-columns: 1fr;
            }
            .contenido-login {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <div class="contenido-login">
            <form action="" method="post">
                <h2>StratManage360</h2>
                <?php if (isset($mensaje)) { ?>
                <div class="alert alert-danger" role="alert">
                    <strong><?php echo $mensaje; ?></strong>
                </div>
                <?php } ?>
                <div class="input-div dni">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <input type="text" name="usuario" class="input" placeholder=" " required>
                        <h5>Usuario</h5>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <input type="password" name="password" class="input" placeholder=" " required>
                        <h5>Contraseña</h5>
                    </div>
                </div>
                <input type="submit" class="btn" value="Iniciar Sesión">
            </form>
        </div>
    </div>
    <script src="js/login.js"></script>
</body>
</html>

