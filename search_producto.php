<!-- Incio del contenido -->
    <?php
    include 'bd/conexion.php';
    $busqueda = strtolower($_REQUEST['buscar_produc']);
    $busqueda = trim($busqueda);
    if (empty($busqueda)) {
        echo "
        <script>window.location.href='catalogo'</script>
        ";
    }
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    /*  $consulta = "SELECT id, nombre, apellidos, email, telefono, estado FROM usuarios"; */

    $consulta = "SELECT titulo,precio,foto,codigo_produc,descripcion FROM producto WHERE (titulo LIKE '%$busqueda%' OR precio LIKE '%$busqueda%' OR codigo_produc LIKE '%$busqueda%' OR descripcion LIKE '%$busqueda%');";
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
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;700;800&family=Orbitron:wght@400;700&family=Oswald:wght@400;700&family=Roboto:wght@100;400;700&family=Teko:wght@400;700&display=swap"
        rel="stylesheet">
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
    <div class="container">
        <main>
            <h2 class="separador">Nuestro catalogo completo</h2>
           <div class="content-select container">
            <p>Buscar por categoria</p>
               <select name="" id="" >
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
           <div class="container">
                 <?php
               
               if($data){
                   echo "<h2>Mostrando resultados de: $busqueda</h2>";
               }
               ?> 
              
           </div>
            <section class="ofetas-des">
                <?php
                foreach($data as $producto){
                ?>
                <div class="productos" style="margin-bottom: 100px;">
                    <img src="0100110/admin/foto_produc/<?php echo $producto['foto'] ?>" alt="">
                    <h3><?php echo $producto['titulo'] ?></h3>
                    <h4 class="precio"><?php echo $producto['precio'].'€' ?></h4>
                    <p>Agregar al carrito</p>
                    <i class="fas fa-plus-circle"></i>
                </div>
                <?php }?>
            </section>
            <?php 
                if(@$producto==''){
                    echo "<h2 style='color:#cacaca;'>No se han encontrado resultados respecto a la busqueda: $busqueda</h2>";
                }
                ?>
        </main>
        <a href='catalogo' class='boton-in'>Volver</a>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="js/main.js"></script>
</body>

</html>