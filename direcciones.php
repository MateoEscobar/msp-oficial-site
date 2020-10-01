<?php
session_start();
$name = $_SESSION['email'];
if (!isset($name)) {
 header ('location: login');
 exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maderas San Pascual S.L</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;700;800&family=Orbitron:wght@400;700&family=Oswald:wght@400;700&family=Roboto:wght@100;400;700&family=Teko:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

    <header class="header">
        <div class="navegacion">
            <nav>
                <div class="menu-icon">
                    <span class="fas fa-bars"></span></div>
                <div class="logo">
                    <a href="/">
                        <img src="img/Untitledlogomsp1 (1).svg" alt=""></div></a>
                <div class="nav-items">
                    <li><a href="/" class="en-home">Inicio</a></li>
                    <li><a href="catalogo">Catalogo</a></li>
                    <li><a href="parquet">Parquet</a></li>
                    <li><a href="ferreteria">Ferreteria</a></li>
                    <li><a href="contacto">Contacto</a></li>
                    <li><a href="salir">Salir <i class="fas fa-sign-out-alt"></i></a></li>
                    <div class="cancel-icon1">
                        <span class="fas fa-times"></span>
                    </div>
                </div>
                <div class="search-icon">
                    <a href="login" style="color:white; text-decoration:none;" class="fas fa-sign-out-alt"></a>
                </div>
            </nav>
        </div>
    </header>
    <div class="container">
        <div class="direcciones_user">
            <img src="img/direcciones.png" alt="">
            <h2>Agregar Direcciones</h2>
            <div class="editar-campos">
            <form action="" class="campos-config">
                <label for="nombre" style="font-weight: bold;">Línea 1 de la dirección:</label>
                <input type="text" placeholder="Nombre de la calle">
                <label style="font-weight: bold;" for="Apellidos">Línea 2 de la dirección:</label>
                <input type="text" placeholder="Información adicional de la calle">
                <label style="font-weight: bold;" for="email">Ciudad:</label>
                <input type="text" placeholder="Ciudad en la que reside">
                <label style="font-weight: bold;" for="password">Código postal:</label>
                <input type="text" placeholder=" Código postal de la direccion">
                <label style="font-weight: bold;" for="phone">Información adicional:</label>
                <input type="tel" placeholder="Otra información">
                <a href="profile" style="background-color: #cacaca; color:black;" class="boton-in">Volver</a>
                <button class="boton-in">Guardar</button>
            </form>
            </div>
        </div>

    </div><!-- CONTAINER -->

    <footer class=" footer-main">
        <p class="text-foo">&copy Todos los derechos reservados msp 2020
        </p>
    </footer>
    <!-- -------------------------------------------------------------------------------------------------------------------- -->
    <!-- SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pushbar.js@1.0.0/src/pushbar.min.js"></script>
    <script src="js/carrito.js"></script>
    <script src="js/node_modules/jquery/dist/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://kit.fontawesome.com/92d62fee25.js" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>