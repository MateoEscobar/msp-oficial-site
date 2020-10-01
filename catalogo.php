<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM producto ORDER BY id DESC";
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
                    <li><a href="#" class="en-home">Catalogo</a></li>
                    <li><a href="parquet">Parquet</a></li>
                    <li><a href="ferreteria">Ferreteria</a></li>
                    <li><a href="contacto">Contacto</a></li>
                    <li class="perfil"><a href="profile">Perfil<i class="fas fa-user-alt"></i></a></li>
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
    <div class="container">

        <main>
            <h2 class="separador">Nuestro catalogo completo</h2>
            <div class="content-select container">
                <p>Buscar por categoria</p>
                <select name="" id="">
                    <option value="" selected disabled>Seleccione una categoria:</option>
                    <option value="">Puertas Lisa</option>
                    <option value="">Puertas Mapi</option>
                    <option value="">Puertas Roble</option>
                    <option value="">Puertas Lisa</option>
                    <option value="">Puertas Mapi</option>
                    <option value="">Puertas Roble</option>

                </select>
                <i></i>
            </div>

            <section class="ofetas-des">
                <?php
                foreach ($data as $producto) {
                ?>
                    <div class="productos">
                        <img src=" 0100110/admin/foto_produc/<?php echo $producto['foto'] ?>" alt="">
                        <a href="view_producto.php?producto=<?php echo $producto['codigo_produc']; ?>" id="btnabrir"><?php echo $producto['titulo'] ?></a>
                        <h4 class="precio"><?php echo $producto['precio'] . '€' ?></h4>
                        <a href="view_producto.php?producto=<?php echo $producto['codigo_produc']; ?>" class="ver-mas"><p id="view-pro">Ver más detalles del producto</p></a>  
                        <i class="fas fa-plus-circle"></i>
                    </div>
                <?php } ?>

            </section>
        </main>
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
                <p class="nombre-item"></p>
                <p class="price"></p>
                <div class="cant-dele">
                    <label for="cantidad"></label>
                    <input type="number" id="cantidad" min="0">
                    <p class="delete"><i class="fas fa-trash-alt"></i></p>
                </div>
            </div>
        </div>
        <div class="total">
            <p class="total-precio">Total:</p>
            <p></p>
        </div>

    </div><!-- Carrito -->
</body>

</html>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="js/main.js"></script>

<script type="text/javascript" src="datables/datable.js"></script>
 <script type="text/javascript" src="datables/jquery.js"></script>
 <script type="text/javascript" src="datables/boostrapdata.js"></script>

</body>

</html>