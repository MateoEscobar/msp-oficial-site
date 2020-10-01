<?php
session_start();
$email = $_SESSION['email'];
if (!isset($email)) {
    header('location: login');
    exit();
}
include 'conexion_db.php';
$consulta = "SELECT * FROM usuarios WHERE email='$email'";
$resultado = mysqli_query($conexion, $consulta);
$array = mysqli_fetch_array($resultado);
$nombre_db = $array['nombre'];
$apellido_db = $array['apellidos'];
$correo_db = $array['email'];
$phone = $array['telefono'];
$img_db = $array['img_perfil'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maderas San Pascual S.L</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pushbar.js@1.0.0/src/pushbar.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;700;800&family=Orbitron:wght@400;700&family=Oswald:wght@400;700&family=Roboto:wght@100;400;700&family=Teko:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header_profile">

    </header>


    <div class="mainUser font">
        <div class="salir">
            <a href="/" class="inicio_profile">Inicio</a>
            <a href="" class="carrito_profile"> Carrito</a>
            <a href="catalogo" class="catalogo_profile">Catalogo</a>
            <a href="salir" class="salir_profile">Salir <i class="fas fa-sign-out-alt"></i></a>
        </div>



        <div class="container">
            <div class="img_nom">
                <img src="fotos/<?php if($img_db ==''){echo 'encabezadomsp.png';}else{echo $img_db;}?>" alt="Foto de perfil" class="img_user"><br>
                <h1 class="nombre_perfil"><?php echo $nombre_db . ' ' . $apellido_db; ?></h1>
            </div>
               
        </div>
    </div>

    <div class="data">
        <div class="circle"></div>
        <div class="menu">
            <ul>
                <li><i class="fas fa-folder"></i> <a href="">Pedidos</a></li>
                <li><i class="fas fa-address-card"></i> <a href="direcciones">Direcciones</a></li>
                <li><a href=""><i class="fas fa-file-invoice"></i> Facturas</a></li>
                <li><a href="user-config"><i class="fas fa-user-cog"></i> Editar Perfil</a></li>

            </ul>
        </div>
        <div class="burger">
            <div class="x"></div>
            <div class="y"></div>
            <div class="z"></div>
        </div>

        <nav>
            <ul class="ul_profile">

                <li><i class="fas fa-folder"></i> <a href="">Pedidos</a></li>
                <li><i class="fas fa-address-card"></i> <a href="direcciones">Direcciones</a></li>
                <li><a href=""><i class="fas fa-file-invoice"></i> Facturas</a></li>
                <li><a href="user-config"><i class="fas fa-user-cog"></i> Editar Perfil</a></li>

            </ul>
        </nav>
        <div class="enlaces_profile">
                 <a href="/" class="">Inicio</a>
                <a href="" class=""><i class="fas fa-shopping-cart"></i> Carrito</a>
                <a href="catalogo" class=""><i class="fas fa-book-open"></i> Catálogo</a>
            </div>
    </div>
    <div class="container">
        <main>
            <h2 class="separador">Ultimas Compras</h2>
            <section class="ofetas-des">
                <div class="productos">
                    <img src="img/relleno.jpg" alt="">
                    <h3>Puerta mapi lacada 2.030 mm altura estandar</h3>
                    <h4 class="precio">920€</h4>
                    <p>Agregar al carrito</p>
                    <i class="fas fa-plus-circle"></i>
                </div>
                <div class="productos">
                    <img src="img/1.jpg" alt="">
                    <h3>Fibracolour textura Acabado Mojave</h3>
                    <h4 class="precio">80€/m<span>2</span></h4>
                    <p>Agregar al carrito</p>
                    <i class="fas fa-plus-circle"></i>
                </div>
                <div class="productos">
                    <img src="img/6.jpg" alt="">
                    <h3>Puerta Blindada anti bumping</h3>
                    <h4 class="precio">920€</h4>
                    <p>Agregar al carrito</p>
                    <i class="fas fa-plus-circle"></i>
                </div>
                <div class="productos">
                    <img src="img/3.jpg" alt="">
                    <h3>Puerta Acorazada echa a medida</h3>
                    <h4 class="precio">920€</h4>
                    <p>Agregar al carrito</p>
                    <i class="fas fa-plus-circle"></i>
                </div>
    </div>
    <footer class=" footer-main">
        <p class="text-foo">&copy Todos los derechos reservados msp 2020
        </p>
    </footer>
    <!-- -------------------------------------------------------------------------------------------------------------------- -->
    <!-- SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/node_modules/jquery/dist/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://kit.fontawesome.com/92d62fee25.js" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>