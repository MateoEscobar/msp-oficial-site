<?php
session_start();
if (isset($_POST['btncontacto'])) {
$_SESSION['nombre'] = $_POST['nombre'];
$_SESSION['email'] = $_POST['correo'];
$_SESSION['telefono'] = $_POST['telefono'];
$_SESSION['asunto'] = $_POST['asunto'];
$_SESSION['mensaje'] = $_POST['mensaje'];
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;700;800&family=Orbitron:wght@400;700&family=Oswald:wght@400;700&family=Roboto:wght@100;400;700&family=Teko:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

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
                    <li><a href="contacto" class="en-home">Contacto</a></li>
                    <li class="perfil"><a href="login">Perfil<i class="fas fa-user-alt"></i></a></li>
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

                <form action="search_producto" method="GET">
                    <input name="buscar_produc" type="search" class="search-data" placeholder="Buscar...">
                    <button type="submit" class="fas fa-search"></button>
                </form>
                <div class="shopping" id="shopping">
                    <button data-pushbar-target="carrito">
                        <i class="fas fa-shopping-cart">
                            <p>Carrito</p>
                        </i>
                    </button>


                </div>
            </nav>
        </div>
    </header>
    <div class="servicios">
        <img src="img/Untitledlogomsp1 (1).svg" alt="">
        <div class="cuarenta">
            <h2>40 </h2>
            <h3>Años a su <br> servicio</h3>
        </div>
    </div>

    <div class="container">
        <div class="contacto">
            <h2 class="">Contacto:</h2>
            <h3><i class="fas fa-phone-square"></i>933113823 - 933113902</h3>
        </div>
    </div>
    <div class="container">
        <div class="contactar">
            <h2>Contactar con atencion al cliente o informar una incidencia</h2>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" id="queryid">
                <label for="nombre">Nombre Completo:</label>
                <input type="text" name="nombre" placeholder="Ingrese su nombre" value="<?php if(isset($_SESSION['nombre'])){ echo $_SESSION['nombre']; } ?>">
                <label for="email">Email:</label>
                <input type="email" name="correo" placeholder="Ingrese su Email" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email']; } ?>">
                <label for="phone">Telefono</label>
                <input type="tel" name="telefono" placeholder="Ingrese su Telefono" value="<?php if(isset($_SESSION['telefono'])){ echo $_SESSION['telefono']; } ?>">
                <label for="asunto">Asunto:</label>
                <input type="text" name="asunto" placeholder="Motivo de Contacto" value="<?php if(isset($_SESSION['asunto'])){ echo $_SESSION['asunto']; } ?>">
                <p style="color: white;">Preferencia Horaria para ponernos en contacto con usted:</p>
                <input type="radio" id="mañanas" name="horario" value="mañanas">
                <label for="mañanas">08:00H-13:00H</label><br>
                <input type="radio" id="tardes" name="horario" value="tardes">
                <label for="tardes">15:00H-19:00H</label><br>

                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="" cols="30" rows="10"><?php if(isset($_SESSION['mensaje'])){ echo $_SESSION['mensaje']; }?></textarea>
                <button class="boton-in" name="btncontacto">Enviar</button>
            </form>
        </div>
        <footer class="footer-main">
            <p class="text-foo">&copy Todos los derechos reservados msp 2020
            </p>
        </footer>
        <!-- -------------------------------------------------------------------------------------------------------------------- -->
        <!-- SCRIPTS -->
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/pushbar.js@1.0.0/src/pushbar.min.js"></script>
        <script src="js/carrito.js"></script>
        <script src="js/node_modules/jquery/dist/jquery.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="https://kit.fontawesome.com/92d62fee25.js" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
        
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


if (isset($_POST['btncontacto'])) {
        $mail = new PHPMailer(true);
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $mensaje = $_POST['mensaje'];
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];
        $horario = $_POST['horario'];

    if (empty($nombre && $correo && $telefono && $mensaje && $asunto && $mensaje)) {
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Rellene los Campos',
            html: '<p style=color:red;>Todos los campos son obligatorios, por favor rellenelos</p>',
            footer: '<b>© Todos los derechos reservados msp 2020</b>'
          });
          </script>";
        exit();
    }
    if (strlen($nombre) < 10) {
        echo "<script>Swal.fire({
        icon: 'error',
        title: 'Nombre Incompleto',
        html: '<p style=color:red;>Ingrese su nombre y apellido</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      })</script>";
        exit();
    }
    if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $correo)) {
    } else {
        echo "<script>Swal.fire({
        icon: 'error',
        title: 'Email Invalido',
        html: '<p style=color:red;>Ingrese un email valido. ejemplo: correo@correo.com</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      })</script>";
        exit();
    }
    if (preg_match('/0{0,2}([\+]?[\d]{1,3} ?)?([\(]([\d]{2,3})[)] ?)?[0-9][0-9 \-]{6,}( ?([xX]|([eE]xt[\.]?)) ?([\d]{1,5}))?/', $telefono)) {
    } else {
        echo "<script>Swal.fire({
        icon: 'error',
        title: 'Teléfono Invalido',
        html: '<p style=color:red;>Solo son admitidos números</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      })</script>";
        exit();
    }
    if (strlen($asunto) < 10) {
        echo "<script>Swal.fire({
        icon: 'error',
        title: 'Asunto invalido',
        html: '<p style=color:red;>Por favor ingrese un asunto valido, +10 caracteres</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      })</script>";
        exit();
    }
    if (strlen($mensaje) < 20) {
        echo "<script>Swal.fire({
        icon: 'error',
        title: 'Mensaje muy corto',
        html: '<p style=color:red;>Por favor ingrese un mensaje más específico</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      })</script>";
        exit();
    }
    if(empty($horario)){
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Seleccione Horario',
            html: '<p style=color:red;>Por favor seleccione un horario en el que desea que nos pongamos en contacto con usted</p>',
            footer: '<b>© Todos los derechos reservados msp 2020</b>'
          });
          </script>";
            exit();
    }
    try {

        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->CharSet = "UTF-8";
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'orlandis2014@gmail.com';                     // SMTP username
        $mail->Password   = 'Orlandis1';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom("$correo", "$nombre");
        $mail->addAddress('cuevassoto27@hotmail.com', "$nombre");

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "Asunto: $asunto";
        $mail->AddEmbeddedImage('cabeza.png', 'logo_2u');

        $mail->Body    = "<div style=';background:#0d1321; text-align:center;padding:20px;border-radius:10px 10px 0 0;'>
    <img src='cid:logo_2u'>
    <h2>De: </h2><b style='color:green;'>$nombre\n</b><h2>Correo:</h2><b style='color:green;'> $correo\n</b><h2>Telefono:</h2><b style='color:green;'>$telefono\n</b><h2>Asunto:</h2> <b style='color:green;'>$asunto\n</b><h2>Horario:</h2><b style='color:green;'> $horario\n</b><h2>Mensaje:\n</h2><b style='color:green;'> $mensaje</<b>    </div>
    <header style='background:#000000;padding:10px;color:white;width:400px;margin-top:0;text-align:center;'><p>Todos los derechos reservados msp 2020</p></header>
    ";

        if ($mail->send()) {
                echo "<script>const Toast = Swal.mixin({
                    toast: true,
                    position: 'center',
                    showConfirmButton: false,
                    timer: 20000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                Toast.fire({
                    icon: 'success',
                    title: 'Mensaje enviado Correctamente'
                });
                </script>";
                session_destroy();

    }
    } catch (Exception $e) {
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Error Inesperado',
            html: '<p style=color:red;>Ocurrio un error inesperado, lo solucionaremos en breve</p>',
            footer: '<b>© Todos los derechos reservados msp 2020</b>'
          })</script>";}
}
?>
</body>
</html>
