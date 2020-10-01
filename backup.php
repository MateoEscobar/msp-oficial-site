<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maderas San Pascual S.L</title>
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;700;800&family=Orbitron:wght@400;700&family=Oswald:wght@400;700&family=Roboto:wght@100;400;700&family=Teko:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
    <link rel="shortcut icon" href="img/cabeza.png" type="image/x-icon">
    <style>
        .formulario-bk {
            margin: calc(50vh - 200px) 0 0 0;
        }

        .encan-rep b {
            font-family: 'Oswald', sans-serif;
            font-size: 1.5em;
            color: #f9627d;
        }

        .encan-rep p {
            font-family: 'Oswald', sans-serif;
            font-size: .8em;
            color: #000;
            margin: 10px;
        }

        input {
            background-color: #fff;
            border: none;
            padding: 10px;
            margin: 10px;
            width: 20%;
            border-bottom: 3px solid #3a405a;
            background-image: url('gmail1.png');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 20px;
            display: flex;
            margin: 0 auto;
            transition: all 1s ease;
        }

        input:focus {
            border-bottom: 3px solid #07a0c3;

        }

        @media (max-width: 768px) {
            input {
                width: 80%;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="navegacion">
            <nav>
                <div class="menu-icon">
                    <span class="fas fa-bars"></span></div>
                <div class="logo">
                    <a href="/">
                        <img src="img/Untitledlogomsp1 (1).svg" alt=""></a></div>
                <div class="nav-items">
                    <li><a href="/" class="en-home">Inicio</a></li>
                    <li><a href="catalogo">Catalogo</a></li>
                    <li><a href="parquet">Parquet</a></li>
                    <li><a href="ferreteria">Ferreteria</a></li>
                    <li><a href="contacto">Contacto</a></li>
                    <li class="perfil"><a href="profile">Perfil<i class="fas fa-user-alt"></i></a></li>
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

    </header>
    <div class="container">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="formulario-bk">
            <div class="encan-rep" id="recu-pss">
                <b><i class="fas fa-key"></i> Recuperar Contraseña</b>
                <p>Ingresa tu correo electronico <br> para recibir las instrucciones</p>
            </div>
            <!-- 
            <label for="bkemail"><i class="fas fa-envelope"></i></label> -->
            <div class="input-icono">
                <input type="email" name="bkemail" id="bkemail" placeholder="Ingrese su Email" required><br>
            </div>
            <button type="submit" class="boton-in" name="pwdrecu">Recuperar</button>
        </form>
        <div class="ft">
            <a href="login">Ya tengo cuenta!</a>

            <p>No tienes una cuenta? <a href="registrarse" style="color: blue;">Registrate aquí!</a></p>
        </div>
    </div>
    <footer class="footer2 footer-main">
        <p class="text-foo">&copy Todos los derechos reservados msp 2020</p>
        <a href="aviso-legal">ver aviso legal</a>
        <a href="terminos-condiciones">ver terminos y condiciones</a>
    </footer>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pushbar.js@1.0.0/src/pushbar.min.js"></script>
    <script src="js/carrito.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://kit.fontawesome.com/92d62fee25.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script>
        $(".formulario-bk").validate();
    </script>
</body>
</html>

<?php
include 'conexion_db.php';
include 'enviar_correo.php';
if(isset($_POST['pwdrecu'])){
    $email = $_POST['bkemail'];
    $correo = mysqli_real_escape_string($conexion, $_POST['bkemail']);
    $sqlrecu = "SELECT * FROM usuarios WHERE email = '$correo' ";
    $resultrecu = $conexion->query($sqlrecu);
    $result = $resultrecu -> num_rows;
    if($result === 0){ 
    echo "
    <script>
    Swal.fire({
        icon: 'error',
        title: 'Usuario no encontrado',
        html: '<p style=color:red;>El usuario $email no fue encontrado!</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'    
    });
    </script>
    ";
        exit();
    }else{
        $user = $resultrecu -> fetch_assoc();
        $mail = $user['email'];
        $token = $user['id'];
        $nombre = $user['nombre'];
        $apellido = $user['apellidos'];
        $para_usuario = $mail;
        $asunto = 'Cambiar Password (Msanpascual.com)';
        $mensaje = 'Hola '.$nombre. ' '. $apellido. ' Has pedido un cambio de contraseña! <br>
        Por favor haz click en el link para cambiar tu contraseña: <br>
        <a href="http://localhost/msp-oficial-site/recuperar.php?email='.$mail.' &token='.$token.'"><b>Click aqui para cambiar contraseña</b></a>';
        sendEmail($para_usuario,$asunto,$mensaje);
        echo "
        <script>
        Swal.fire({
            icon: 'success',
            title: 'Revice su correo',
            html: '<p style=color:green;>Por favor revice su correo [$email] por un link de confirmación para completar el cambio de contraseña!</p>',
            footer: '<b>© Todos los derechos reservados msp 2020</b>'    
        }).then(resultado => {
            if (resultado.value) {
                // Hicieron click en 'Sí'
                window.location.href='login';
            }else{
                window.location.href='login';
            }
        });
        </script>";
    }
}
?>