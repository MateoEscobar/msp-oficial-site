<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Open+Sans:wght@400;700&family=Oswald:wght@400;700&family=Teko:wght@400;700&display=swap" rel="stylesheet">
    <style>
        html {
            box-sizing: border-box;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: #190933;
        }

        .container {
            margin: 0 auto;
            background-color: #fff;
            width: 400px;
            border-radius: 10px;
        }

        .contenido {
            display: block;
            margin: calc(50%) auto;
            text-align: center;
            margin-top: 0;
        }

        .contenido img {
            margin: 15px;

        }

        h2 {
            font-family: 'Oswald', sans-serif;
            text-align: center;
            margin-top: calc(10%);
            text-transform: uppercase;
            color: #fff;
            line-height: 2;
        }

        @media (max-width: 768px) {
            h2 {
                margin-top: calc(50%);
            }
        }

        input {
            width: 80%;
            margin-bottom: 10px;
            padding: 10px;
            outline: none;
            border: none;
            color: white;
            background-color: #190933;
            border-radius: 5px;
        }

        Input:Focus {
            color: white;
        }

        button {
            margin: 15px;
            background-color: #5465ff;
            width: 80%;
            padding: 10px;
            border: none;
            cursor: pointer;
            transition: all .3s ease;
            font-family: 'Teko', cursive;
            font-size: 1.2em;
            outline: none;
        }

        button:hover {
            background-color: #04395e;
            color: white;

        }

        .initial {
            display: block;
            color: black;
            padding: 10px;
            background-color: rgba(255, 0, 0, 0.24);
            font-family: 'Oswald', sans-serif;
            font-weight: bold;
        }

        .error {
            display: block;
            color: black;
            padding: 10px;
            background-color: rgba(255, 0, 0, 0.24);
            font-family: 'Oswald', sans-serif;
            font-weight: bold;
        }


        .span2 {
            display: block;
            color: black;
            padding: 10px;
            background-color: RGBA(255, 255, 0, 0.17);
            font-family: 'Oswald', sans-serif;
            font-weight: bold;
        }

        .span1 {
            display: block;
            color: black;
            padding: 10px;
            background-color: RGBA(0, 255, 0, 0.2);
            font-family: 'Oswald', sans-serif;
            font-weight: bold;
        }

        /* 
        font-family: 'Great Vibes', cursive;
        font-family: 'Open Sans', sans-serif;
        font-family: 'Oswald', sans-serif;
        font-family: 'Teko', sans-serif; 
*/
    </style>
</head>

<body>
    <h2>Admin Dashboard</h2>
    <div class="container">
        <div class="contenido">
            <form action="validate" id="furmulario_login" method="POST" minlength="4">
                <img src="parapdf.png" alt="">
                <input type="text" name="usuario" id="usuario" class="usuario" placeholder="Nombre de Usuario" required>
                <span id="user"></span><br>
                <input type="password" name="password" id="password" class="password" placeholder="Ingrese su contraseña" required>
                <span id="passstrength"></span>
                <button type="submit" value="Validate!" name="submit-btn">Entrar</button>
            </form>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
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
       
    </script>
</body>

</html>