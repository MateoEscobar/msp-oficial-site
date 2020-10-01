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
        </div>
        </nav>
        </div>
    </header>
    <div class="container">
        <div class="encabezado-reg">
            <h3>Registrese para obtener la ventaja de hacer sus pedidos en un click y
                poder consultar sus facturas en todo momento
            </h3>
            <p>Rellene este formulario para continuar el registro</p>
            <a href="login">Ya tengo cuenta!</a>
        </div>

        <div class="contactar">
            <h2>Registrarse</h2>
            <form action="usuarios" method="POST" class="fomrulario_sub" enctype="multipart/form-data">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre">
                <label for="Apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos" placeholder="Ingrese sus Apellidos">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Ingrese su Email">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Ingrese su Contraseña">
                <span id="passstrength"></span>
                <label for="password2">Confirme su Contraseña:</label>
                <input type="password" id="password2" name="password2" placeholder="Confirme su Contraseña">
                <span id="passconf"></span>
                <label for="phone">Telefono:</label>
                <input type="tel" id="phone" name="phone" placeholder="Ingrese su Telefono">
                <p class="parraf_subir">Foto del Perfil :</p> <br>
                <label for="img_perfil"><i class="fas fa-file-upload"></i> Subir</label><br><br>
                <input type="file" id="img_perfil" name="img_perfil" class="ocult_input">
                <button name="registro" class="boton-in">Registrarse</button>
            </form>


        </div>

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
        <script src="js/validar_form.js"></script>
        <script>
            $('#password').keyup(function(e) {
                var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
                var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
                var enoughRegex = new RegExp("(?=.{6,}).*", "g");
                if (false == enoughRegex.test($(this).val())) {
                    $('#passstrength').addClass("initial");
                    $('#passstrength').html('Tu Contraseña a de tener entre 8 y 16 Carácteres');
                } else if (strongRegex.test($(this).val())) {
                    $('#passstrength').addClass("span1");
                    $('#passstrength').html('Tu Contraseña es Segura!');
                } else if (mediumRegex.test($(this).val())) {
                    $('#passstrength').addClass("span2");
                    $('#passstrength').html('Tu Contraseña tiene una seguridad media!');
                } else {
                    $('#passstrength').addClass("error");
                    $('#passstrength').html('Tu Contraseña es poco segura!');
                }
                return true;
            });
            $('#password, #password2').on('keyup', function() {
                if ($('#password').val() == $('#password2').val()) {
                    $('#passconf').html('Las Contraseñas coinciden').css('color', 'white').css('display', 'block').css('background', 'green').css('padding', '10px').css('font-size', '1em').css('margin-bottom', '5px').css('fontFamily', 'Oswald').css('fontWeight', 'bold');
                } else $('#passconf').html('Las Contraseñas no coinciden').css('color', 'white').css('display', 'block').css('background', 'red').css('padding', '10px').css('font-size', '1em').css('margin-bottom', '5px').css('fontFamily', 'Oswald').css('fontWeight', 'bold');
            });
        </script>
</body>

</html>