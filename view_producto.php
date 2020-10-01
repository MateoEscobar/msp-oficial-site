<?php
if (!isset($_REQUEST['producto'])) {
    header("location: catalogo");
}
include_once 'bd/conexion.php';
$produc_code = $_REQUEST['producto'];
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id,titulo,descripcion,precio,categoria_id,fecha,foto,codigo_produc,estado FROM producto WHERE codigo_produc LIKE '$produc_code'";
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
                    <li><a href="catalogo" class="en-home">Catalogo</a></li>
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
    <?php
    foreach ($data as $prod_key) {


    ?>
        <div class="container">
            <div class="producto_descripcion">
                <img src="0100110/admin/foto_produc/<?php echo $prod_key['foto'] ?>" alt="">
                <div class="titulos_produc">
                    <h2><?php echo $prod_key['titulo'] ?></h2>
                    <p class="precio" style="color: black;font-size:1.2em;">Precio Unidad:</p>
                    <h3 class="precio"><?php echo $prod_key['precio'] ?> €</h3>
                    <p class="referencia">REF: <?php echo $prod_key['codigo_produc'] ?> </p>
                    <div class="shipping_collet">
                        <div class="collet">
                            <b><i class="fas fa-map-marker"></i> Click&Collect</b>
                            <p style="color: #cacaca;"> Solo disponible para<br> su recogida en tienda</p>
                        </div>
                        <div class="shipping">
                            <b><i class="fas fa-shipping-fast"></i> Envío a domicilio</b>
                            <p style="color: #cacaca;">No disponible*</p>
                        </div>

                    </div>
                    <div class="cant_price">
                        <input type="number" name="cantidad_prod" id="cantidad_prod" placeholder="Cantidad">
                        <h4 class="precio_int" id="precio_int">0</h4>
                        </div>
                    <button class="btn-card">Añadir al Carrito</button>
                </div>
            </div>
            <div class="descripcion_main">
                <h3>DESCRIPCIÓN</h3>
                <p><?php echo $prod_key['descripcion'] ?> </p>
            </div>

            <a href="" class="ficha_tecnica">Ver ficha tecnica</a>
        <?php
    }
        ?>
        </div>
        <?php require_once 'vistas/footer.html' ?>
        <footer class="footer-main" style="margin-top: 0;">
            <p class="text-foo">&copy Todos los derechos reservados msp 2020
            </p>
        </footer>
</body>

</html>

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

<script>
    <?php foreach ($data as $prod_key) {
        ?>
$('#cantidad_prod').change(function(){

    var inp = $('#cantidad_prod').val();
    var insert = $('#precio_int');
    var price = '<?php echo $prod_key['precio']; ?>';

    <?php
    }
    ?>

    insert.html(inp*price + '€');

});

</script>
</body>
</html>