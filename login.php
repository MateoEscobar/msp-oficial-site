<?php
@session_start();
@$email2 = $_SESSION['email2'];
@$email = $_SESSION['email'];
if(isset($email)) {
    header ('location: profile');
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pushbar.js@1.0.0/src/pushbar.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;700;800&family=Orbitron:wght@400;700&family=Oswald:wght@400;700&family=Roboto:wght@100;400;700&family=Teko:wght@400;700&display=swap"
        rel="stylesheet">
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
                    <li><a href="/">Inicio</a></li>
                    <li><a href="catalogo">Catalogo</a></li>
                    <li><a href="parquet">Parquet</a></li>
                    <li><a href="ferreteria">Ferreteria</a></li>
                    <li><a href="contacto">Contacto</a></li>
                    <li class="perfil"><a href="profile" class="en-home">Perfil<i class="fas fa-user-alt"></i></a></li>
                    <div class="cancel-icon1">
                        <span class="fas fa-times"></span>
                    </div>
                </div>
                <div class="search-icon">
                    <span class="fas fa-search"></span>
                </div>
                <div class="cancel-icon">
                    <span class="fas fa-times"></span>
                </div>
                </nav>
            <div class="container">
                <h2 class="separador">Inicie sección para ingresar en su cuenta</h2>
            </div>
            <div class="login">
                <h2>Iniciar Sección</h2>
                 <form  action="validar_login" method="POST">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Ingrese su Email" value="<?php if(isset($email2)){ echo $email2; } ?>">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" placeholder="Ingrese su Contrasña" >
                    <div class="parte-baja">
                        <p>¿Aun no tienes cuenta?</p>
                        <a href="registrarse">Registrarse</a>
                        <a href="backup">¿Olvidaste tu cuenta?</a>
                        <button name="btn-sigini" class="boton-in">Entrar</button>
                    </div>
            </form>
             </div>

        </div><!-- Carrito -->
    <footer class="footer-main">
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