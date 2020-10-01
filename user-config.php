<?php
@session_start();
$email = $_SESSION['email'];
if (!isset($email)) {
    header("Location: login");
    exit();
}
include 'conexion_db.php';
$consulta = "SELECT * FROM usuarios WHERE email='$email'";
$resultado = mysqli_query($conexion, $consulta);
$array = mysqli_fetch_array($resultado);
$nombre_db = $array['nombre'];
$apellido_db = $array['apellidos'];
$email_db = $array['email'];
$phone_db = $array['telefono'];
$img_db = $array['img_perfil'];
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;700;800&family=Orbitron:wght@400;700&family=Oswald:wght@400;700&family=Roboto:wght@100;400;700&family=Teko:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

    <header class="header">
        <div class="navegacion">
            <nav>
                <div class="menu-icon">
                    <span class="fas fa-bars"></span></div>
                <div class="logo">
                    <a href="index.php">
                        <img src="img/Untitledlogomsp1 (1).svg" alt=""></div></a>
                <div class="nav-items">
                    <li><a href="/">Inicio</a></li>
                    <li><a href="catalogo">Catalogo</a></li>
                    <li><a href="parquet">Parquet</a></li>
                    <li><a href="ferreteria">Ferreteria</a></li>
                    <li><a href="contacto">Contacto</a></li>
                    <li><a href="salir" class="en-home">Salir <i class="fas fa-sign-out-alt"></i></a></li>
                    <div class="cancel-icon1">
                        <span class="fas fa-times"></span>
                    </div>
                </div>
                <div class="cancel-icon">
                    <span class="fas fa-times"></span>
                </div>
                <div class="search-icon">
                    <a href="salir" style="color:white; text-decoration:none;" class="fas fa-sign-out-alt"></a>
                </div>
            </nav>
        </div>
    </header>
    <div class="container">
         <div class="direcciones_user">
        <form action="cambiar_foto" method="POST" class="campos-config" enctype="multipart/form-data">
            <img src="fotos/<?php echo  $img_db; ?>"><br>
            <label for="edit_perfil">Seleccionar Foto <i class="fas fa-pencil-alt"></i></label>
            <input type="file" name="edit_perfil" id="edit_perfil" class="input_perfil">
            <button class="boton-in" type="submit" name="cambiar_foto">Cambiar</button>   
        </form>
     </div>
        <div class="direcciones_user">
            <form action="usr_update" class="campos-config" method="POST">
                <h2>Editar perfil</h2>
                <label for="nombre">Nombre:</label>
                <input type="text" placeholder="Editar Nombre" value="<?php echo $nombre_db;  ?>" name="nombre" id="nombre">
                <label for="Apellidos">Apellidos:</label>
                <input type="text" placeholder="Editar Apellidos" value="<?php echo $apellido_db;  ?>" name="apellidos" id="apellidos">
                <label for="email">Email:</label>
                <input type="email" placeholder="Editar Email" value="<?php echo $email_db; ?>" name="email" id="email" disabled>
                <button class="boton-in" type="submit" name="enviar_datos_act">Guardar</button>
            </form>
            
            <form action="cell_update" method="POST" class="campos-config">
                <label for="phone" style="font-weight: bold;">Telefono</label>
                <input type="tel" placeholder="Editar Telefono" value="<?php echo $phone_db; ?>" name="phone" id="phone">
                <a href="profile.php" style="background-color: #cacaca; color:black;" class="boton-in">Volver</a>
                <button class="boton-in" type="submit" name="update_cell">Guardar</button>
            </form>

        </div>
  

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