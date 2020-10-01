<?php require_once 'vistas/start.php';
include 'conexion.php';

$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, categoria FROM categorias";

$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</html>
<div class="container">
    <h1>Agregar nuevos Productos</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="titulo">Titulo:</label>
                <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Titulo del Producto">
            </div>
            <div class="form-group col-md-12">
                <label for="descripcion">Descripción:</label>
                <input name="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion del Producto">
            </div>
            <div class="form-group col-md-12">
                <label for="precio">Precio:</label>
                <input name="precio" type="number" class="form-control" id="precio" placeholder="Precio del Producto">
            </div>
            <div class="form-group col-md-12">
                <label for="foto">Foto:</label>
                <input type="file" class="form-control-file" id="foto_prod" name="foto_prod"> </div>
        </div>
        <!-- Material unchecked -->
        <!-- Default unchecked -->
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="productoDestacado" name="productoDestacado">
            <label class="custom-control-label" for="productoDestacado">Producto destacado</label>
        </div>
        <hr class="dotted">
        <div class="form-group">
            <h2>Categorias:</h2>
            <?php
            foreach ($data as $dat) {
            ?>
                <input type="checkbox" name="" id="categoria" value="">
                <label for="categoria"><?php echo $dat['categoria'] ?></label>
            <?php
            }
            ?>
            <!--             <button class="btn btn-info d-block" type="button" data-toggle="modal" data-target="#categoria">Selecione Categorias</button>
 -->
        </div>
        <div class="modal-footer">
            <a href="productos" class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</a>
            <button type="submit" class="btn btn-primary" name="agre_producto" id="agre_producto">Agregar</button>
        </div>
    </form>
</div>
<?php

if (isset($_POST['agre_producto'])) {
    include 'conexion_db.php';

    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $code_unic = uniqid();
    $date = date("d/m/Y");

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
        $check = getimagesize($_FILES['foto_prod']['tmp_name']);
        if ($check !== false) {
            $carpeta_destino = 'foto_produc/';
            $archivo_subido = $carpeta_destino . $_FILES['foto_prod']['name'];
            move_uploaded_file($_FILES['foto_prod']['tmp_name'], $archivo_subido);
        }
    }
    $foto_prod = $_FILES['foto_prod']['name'];
    if (isset($_POST['productoDestacado'])) {
        $dest = "INSERT INTO `destacados`(`titulo`, `descripcion`, `precio`,  `fecha`, `foto`,`codigo_produc`) VALUES ('$titulo','$descripcion','$precio','$date','$foto_prod','$code_unic')";
        $ejec = mysqli_query($conexion, $dest);
    }
    $query = "INSERT INTO `producto`(`titulo`, `descripcion`, `precio`,  `fecha`, `foto`,`codigo_produc`) VALUES ('$titulo','$descripcion','$precio','$date','$foto_prod','$code_unic')";

    $ejecutar = mysqli_query($conexion, $query);
    //verificaccion  del correo en la bd

    if ($ejecutar) {
        echo "<script>
        Swal .fire({
        title: 'Registro correcto',
        text: 'Producto registrado satisfactoriamente',
        icon: 'success',
        confirmButtonText: 'Aceptar',
    }).then(resultado => {
        if (resultado.value) {
            // Hicieron click en 'Sí'
            window.location.href='agregar';
        }else{
            window.location.href='agregar';
        }
    });
            </script>";
    } else {
        echo "
        <script>
        Swal.fire({
            icon: 'error',
            title: 'Error Inesperado',
            html: '<p>Hubo un error al intentar registrar el usuario, por favor intentelo de nuevo</p>',
            footer: '<b>© Todos los derechos reservados msp 2020</b>'
          });
        </script>
    ";
    }
    mysqli_close($conexion);
}
?>

<?php require_once 'vistas/end.php' ?>