<?php
include 'conexion_db.php';
include 'enviar_correo.php';
@session_start();

?>
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
            background-image: url('contrasena.png');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 20px;
            display: flex;
            margin: 0 auto;
            transition: all 1s ease;
            font-family: 'Teko',sans-serif;
        }

        input:focus {
            border-bottom: 3px solid #07a0c3;
            background-position: right 35px center;

        }

        @media (max-width: 768px) {
            input {
                width: 80%;
            }
        }

        #pswd_info {
            position: absolute;
            bottom: 40vh;
            bottom: -115px\9;
            /* IE Specific */
            right: 355px;
            width: 250px;
            padding: 15px;
            background: #fefefe;
            font-size: .875em;
            border-radius: 5px;
            box-shadow: 0 1px 3px #ccc;
            border: 1px solid #ddd;
        }

        #pswd_info h4 {
            margin: 0 0 10px 0;
            padding: 0;
            font-weight: normal;
        }

        #pswd_info::before {
            content: "\25B2";
            position: absolute;
            top: -12px;
            left: 45%;
            font-size: 14px;
            line-height: 14px;
            color: #ddd;
            text-shadow: none;
            display: block;
        }

        .invalid {
            background: url(invalid.png) no-repeat 0 50%;
            padding-left: 22px;
            line-height: 24px;
            color: #ec3f41;
        }

        .valid {
            background: url(valid.png) no-repeat 0 50%;
            padding-left: 22px;
            line-height: 24px;
            color: #3a7d34;
        }

        #pswd_info {
            display: none;
        }
        @media (max-width: 768px) {
            #pswd_info{
                bottom: 450px;
                right: 200px;
            }
        }
        img{
            background-color: #000;
            padding: 2px;
        }
    </style>
</head>

<body>
    <header class="header">
      
        

    </header>
    <div class="container">
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="formulario-bk">
                <img src="img/Untitledlogomsp1 (1).svg" alt="">

        <div class="encan-rep" id="recu-pss">
                <b><i class="fas fa-key"></i> Recuperar Contraseña</b>
                <p>Ingrese su Nueva Contraseña</p>
            </div>
            <!-- 
            <label for="bkemail"><i class="fas fa-envelope"></i></label> -->
            <div class="input-icono">
                <input type="password" name="recupass" id="password" placeholder="Ingrese su Contraseña" required><br>
                <input type="password" name="recupass1" id="password1" placeholder="Repita su Contraseña" required><br>
                <span id="passconf"></span>
            </div>
            <input type="hidden" name="correo" value="<?= $correo ?>">
            <input type="hidden" name="token" value="<?= $token ?>">
            <button type="submit" class="boton-in" name="recuperacion">Actualizar</button>
        </form> 
    </div>
    <div id="pswd_info">
        <h4>La contraseña debe cumplir los siguientes requerimientos:</h4>
        <ul>
            <li id="letter" class="invalid">Al menos <strong>una Minuscula</strong>
            </li>
            <li id="capital" class="invalid">Al menos <strong>una Mayuscula</strong>
            </li>
            <li id="number" class="invalid">Al menos <strong>un número</strong>
            </li>
            <li id="length" class="invalid">Al menos <strong>8 Caracteres</strong>
            </li>
        </ul>
    </div>
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
        $('#password, #password1').on('keyup', function() {
            if ($('#password').val() == $('#password1').val()) {
                $('#passconf').html('Las Contraseñas coinciden').css('color', 'white').css('display', 'block').css('background', 'green').css('padding', '10px').css('font-size', '1em').css('margin-bottom', '5px').css('fontFamily', 'Oswald').css('fontWeight', 'bold');
            } else $('#passconf').html('Las Contraseñas no coinciden').css('color', 'white').css('display', 'block').css('background', 'red').css('padding', '10px').css('font-size', '1em').css('margin-bottom', '5px').css('fontFamily', 'Oswald').css('fontWeight', 'bold');
        });
        $(".formulario-bk").validate();
    </script>
    <script>
        $(document).ready(function() {
            var longitud = false,
                minuscula = false,
                numero = false,
                mayuscula = false;
            $('input[type=password]').keyup(function() {
                var pswd = $(this).val();
                if (pswd.length < 8) {
                    $('#length').removeClass('valid').addClass('invalid');
                    longitud = false;
                } else {
                    $('#length').removeClass('invalid').addClass('valid');
                    longitud = true;
                }

                //validate letter
                if (pswd.match(/[A-z]/)) {
                    $('#letter').removeClass('invalid').addClass('valid');
                    minuscula = true;
                } else {
                    $('#letter').removeClass('valid').addClass('invalid');
                    minuscula = false;
                }

                //validate capital letter
                if (pswd.match(/[A-Z]/)) {
                    $('#capital').removeClass('invalid').addClass('valid');
                    mayuscula = true;
                } else {
                    $('#capital').removeClass('valid').addClass('invalid');
                    mayuscula = false;
                }

                //validate number
                if (pswd.match(/\d/)) {
                    $('#number').removeClass('invalid').addClass('valid');
                    numero = true;
                } else {
                    $('#number').removeClass('valid').addClass('invalid');
                    numero = false;
                }
            }).focus(function() {
                $('#pswd_info').show();
            }).blur(function() {
                $('#pswd_info').hide();
            });
        });
    </script>
</body>

</html>

<?php
if (strlen($password) < 8) {
    echo "<script>Swal.fire({
        icon: 'info',
        title: 'Contraseña no valida',
        html: '<p style=color:red;>La contraseña a de tener 8 o más carácteres</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      });
      </script>";
    exit();
}
if (preg_match('/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/', $password)) {
} else {
    echo "<script>Swal.fire({
        icon: 'error',
        title: 'Contraseña no valida',
        html: '<p style=color:red;>La contraseña debe tener al entre 8 y 16 carácteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      });
      </script>";
    exit();
}
if ($password == $password2) {
} else {
  echo "<script>Swal.fire({
      icon: 'error',
      title: 'Las contraseñas no coinciden',
      html: '<p style=color:red;>Las conotraseñas han de ser completamente iguales</p>',
      footer: '<b>© Todos los derechos reservados msp 2020</b>'
    });
    </script>";
  exit();
}

?>