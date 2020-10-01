<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM destacados ORDER BY id DESC";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.css">
    <link rel="shortcut icon" href="img/cabeza.png" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/ismobilejs@1.1.1/dist/isMobile.min.js"></script>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/ismobilejs@1.1.1/dist/isMobile.min.js"></script>
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

            <div class="imgfont parallax" id="imgfont">

                <div class="text-home">
                    <h1>MSP</h1>
                    <h3>Maderas San Pascual S.L</h3>
                    <p onclick="horarios()">Ver Horario</p>
                </div>
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
        <h2 class="separador">Productos Destacados</h2>
        <section class="ofetas-des">
            <?php
            foreach ($data as $producto) {


            ?>
                <div class="productos">
                    <img src="0100110/admin/foto_produc/<?php echo $producto['foto'] ?>" alt="">
                    <a href="view_producto.php?producto=<?php echo $producto['codigo_produc']; ?>"><?php echo $producto['titulo'] ?></a>
                    <h4 class="precio"><?php echo $producto['precio'] . '€' ?></h4>
                  <a href="view_producto.php?producto=<?php echo $producto['codigo_produc']; ?>" class="ver-mas"><p id="view-pro">Ver más detalles del producto</p></a>  
                    <i class="fas fa-plus-circle" id="view-pro2"></i>
                </div>
            <?php } ?>
        </section>

        </main> <a href="catalogo" class="boton-in">Ver Todo</a>

        <h2 class="separador">Nos puedes encontrar aquí</h2>
        <div class="map" name="mapa-msp">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5981.84485138196!2d2.1988737938671856!3d41.44090485522505!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3e60ec7835dd6ab9!2sMaderas%20San%20Pascual%20S.L.U.!5e0!3m2!1ses!2ses!4v1597946419853!5m2!1ses!2ses" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            <a target="blank" href="https://www.google.com/maps/dir//Maderas+San+Pascual+S.L.U.,+Carrer+de+la+Ciutat+d'Asuncion,+28,+08030+Barcelona/@41.440744,2.1981013,17z/data=!4m8!4m7!1m0!1m5!1m1!1s0x12a4bcea7332602b:0x3e60ec7835dd6ab9!2m2!1d2.20029!2d41.440744?hl=es">Como Llegar</a>
            <strong> - </strong>
            <a href="msp-ansucion-1">Ver Próxima Apertura</a>
        </div>
    </div><!-- CONTAINER -->
    <!-- Carrito de compras  -->
    <div data-pushbar-id="carrito" data-pushbar-direction="right" class="pushbar pushbar-carrito">
        <div class="btn-cerrar izquierda">
            <button data-pushbar-close class="pushbar btn-cerrar"><i class="fas fa-times"></i></button>
        </div>
        <p class="titulo-carrito">Carrito de Compras</p>
        <div class="item">
            <img src="img/1.jpg" alt="">
            <div class="textos">
                <p class="nombre-item">Puerta Mapi Lacada</p>
                <p class="price">120€</p>
                <div class="cant-dele">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" id="cantidad" min="0">
                    <p class="delete"><i class="fas fa-trash-alt"></i></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="img/1.jpg" alt="">
            <div class="textos">
                <p class="nombre-item">Puerta Mapi Lacada</p>
                <p class="price">120€</p>
                <div class="cant-dele">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" id="cantidad" min="0">
                    <p><i class="fas fa-trash-alt"></i></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="img/1.jpg" alt="">
            <div class="textos">
                <p class="nombre-item">Puerta Mapi Lacada</p>
                <p class="price">120€</p>
                <div class="cant-dele">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" id="cantidad" min="0">
                    <p><i class="fas fa-trash-alt"></i></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img src="img/1.jpg" alt="">
            <div class="textos">
                <p class="nombre-item">Puerta Mapi Lacada</p>
                <p class="price">120€</p>
                <div class="cant-dele">
                    <label for="cantidad">Cantidad:</label>
                    <input type="number" id="cantidad" min="0">
                    <p><i class="fas fa-trash-alt"></i></p>
                </div>
            </div>
        </div>
        <div class="total">
            <p class="total-precio">Total:</p>
            <p>240 €</p>
        </div>
    </div><!-- Carrito -->
    <div class="container">
        <div class="contacto">
            <h2 class="separador">Contacto:</h2>
            <h3><i class="fas fa-phone-square"></i>
                <a href="tel:+34933113823" class="telefonos">933113823 </a> -
                <a href="tel:+933113902" class="telefonos">933113902</a></h3>
            <!--  -->
            <a href="contacto" class="contact-correo">
                <p>o envianos un Correo:</p>
                <i class="fas fa-envelope"></i>
            </a>
        </div>
        <div class="redes">
            <h2>Redes Sociales</h2>
            <a target="blanck" href="https://www.facebook.com/MSP-Maderas-San-Pascual-SL-843306849020666/reviews/"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram ig"></i></a>
            <a href="#"><i class="fab fa-pinterest"></i></a>
        </div>
        <h2 class="separador">De Maderas San Pascual S.L.U.</h2>
        <div class="descripcion">
            <p>" Almacén de maderas, especializado en todo tipos de puertas, tanto de interior, como de exterior,</p>
            <p>Blindadas o Acorazada, también tenemos un gran surtido en parquet laminado y flotante de madera maciza y el mayor stock con todas las colecciones de parquet Finfloor y Purefloor,7m y 8m.</p>
            <p>de FINSA y todo tipo de accesorios de ferretería y maquinaria portátil para instalar todos los artículos de madera que ofrecemos, contamos con el Mayor Stock de puertas y parquets de España."</p>
        </div>
    </div>
    <div class="container">
        <div class="newsletter">
            <h2>Recibe ofertas y promociones</h2>
            <form id="formulario_new" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                <input type="email" name="input_new" id="input_new" placeholder="Suscribete a nuestro NewsLetter">
                <input type="submit" value="Suscribirse" style="margin:0 5px; -webkit-appearance: none; appearance: none;" class="boton-in" name="boton-sub" id="boton-sub">
            </form>
        </div>
    </div>
    <!-- carrusel -->

    <div class="container">
        <div class="carrusel">
            <h3>Fotos de las Instalaciones</h3>
            <div class="carrusel-carrusel">
                <div class="carousel__contenedor">
                    <button aria-label="Anterior" class="carousel__anterior">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <div class="carousel__lista">
                        <div class="carousel__elemento">
                            <img src="img/1.jpg" alt="">
                        </div>
                        <div class="carousel__elemento">
                            <img src="img/9.jpg" alt="">
                        </div>
                        <div class="carousel__elemento">
                            <img src="img/10.jpg" alt="">
                        </div>
                        <div class="carousel__elemento">
                            <img src="img/3.jpg" alt="">
                        </div>
                        <div class="carousel__elemento">
                            <img src="img/4.jpg" alt="">
                        </div>
                        <div class="carousel__elemento">
                            <img src="img/5.jpg" alt="">
                        </div>
                        <div class="carousel__elemento">
                            <img src="img/6.jpg" alt="">
                        </div>
                        <div class="carousel__elemento">
                            <img src="img/7.jpg" alt="">
                        </div>
                        <div class="carousel__elemento">
                            <img src="img/8.jpg" alt="">
                        </div>
                    </div>
                    <button aria-label="Siguiente" class="carousel__siguiente">
                        <i class="fas fa-chevron-right" !important></i>
                    </button>
                </div>

                <div role="tablist" class="carousel__indicadores">

                </div>
            </div>

        </div>

    </div>

    <footer class="footer-main">
        <p class="text-foo">&copy Todos los derechos reservados msp 2020</p>
        <a href="aviso-legal">ver aviso legal</a>
        <a href="terminos-condiciones">ver terminos y condiciones</a>
    </footer>

    <!-- -------------------------------------------------------------------------------------------------------------------- -->
    <!-- SCRIPTS -->

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js" data-cfasync="false"></script>
    <script>
        window.cookieconsent.initialise({
            "palette": {
                "popup": {
                    "background": "#3c404d",
                    "text": "#ffffff"
                },
                "button": {
                    "background": "#ffd500"
                }
            },
            "theme": "classic",
            "position": "bottom-right",
            "content": {
                "message": "Este sitio utiliza cookies propias y de terceros. Si continúa navegando consideramos que acepta el uso de estas.",
                "dismiss": "Aceptar",
                "link": "Ver más",
                "href": "https://orlandiscs.com/terminos-condiciones"
            }
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/pushbar.js@1.0.0/src/pushbar.min.js"></script>
    <script src="js/carrito.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://kit.fontawesome.com/92d62fee25.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/fotos.js"></script>


    <script>
        if (isMobile.apple.phone) {
            $('#imgfont').removeClass("imgfont");
            $('#imgfont').addClass("apple");
        }
    </script>
   
</body>

</html>
<?php
include 'conexion_db.php';
if (isset($_POST['boton-sub'])) {
    $input_newsletter = $_POST['input_new'];
    if (empty($input_newsletter)) {
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Rellene el campo ',
            html: '<p style=color:red;>El campo no puede estar vacio, por favor rellene el campo</p>',
            footer: '<b>© Todos los derechos reservados msp 2020</b>'
          });
          document.getElementById('input_new').focus();
          </script>";
        exit();
    }
    if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $input_newsletter)) {
    } else {
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Email Invalido',
            html: '<p style=color:red;>Ingrese un email valido. ejemplo: correo@correo.com</p>',
            footer: '<b>© Todos los derechos reservados msp 2020</b>'
          });
          document.getElementById('input_new').focus();
          </script>";
        exit();
    }
    $veri_newle = mysqli_query($conexion, "SELECT * FROM newsletter WHERE email='$input_newsletter'");
    if (mysqli_num_rows($veri_newle) >= 1) {
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Usuario en uso',
            html: '<p style=color:red;>El usuario $input_newsletter ya esta inscrito en nuestro newsletter</p>',
            footer: '<b>© Todos los derechos reservados msp 2020</b>'
          });
          document.getElementById('input_new').focus();
          </script>";
        exit();
    }
    $query = "INSERT INTO `newsletter`(`email`)VALUES ('$input_newsletter')";
    $ejecutar = mysqli_query($conexion, $query);
    if ($ejecutar) {
        echo "<script>Swal.fire({
            icon: 'success',
            title: 'Muchas Gracias',
            html: '<p style=color:green;>Gracias por inscribirte a nuestro newsletter</p>',
            footer: '<b>© Todos los derechos reservados msp 2020</b>'
          });
          document.getElementById('input_new').focus();
          </script>";
    }
}
?>