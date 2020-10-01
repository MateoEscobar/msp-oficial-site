<?php
session_start();
$email = $_SESSION['usuario'];
if (!isset($email)) {
    header('location: index');
}
?>
<?php require_once 'vistas/start.php';
include 'conexion.php';
@$id = $_GET['id'];
$_SESSION['id'] = $id;
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT titulo,descripcion,precio,foto FROM producto
                        WHERE id LIKE '$id' ";

$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</html>
<div class="container">
    <h1>Editar Producto</h1>
    <?php
    foreach ($data as $dat) {
    ?>
        <!--        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group col-md-12">
                <label for="foto">Foto:</label>
                <img src="foto_produc/<?php echo $dat['foto'] ?>" class="d-block mb-2" width="150">
                <input type="file" class="form-control-file mb-1" id="actu_foto_pd" name="actu_foto_pd">
                <button class="btn btn-primary" name="actu_foto_pro" type="submit">Cambiar</button>
            </div>
        </form> -->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="titulo">Titulo:</label>
                    <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Titulo del Producto" value="<?php echo $dat['titulo'] ?>">
                </div>
                <div class="form-group col-md-12">
                    <label for="descripcion">Descripción:</label>
                    <input name="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion del Producto" value="<?php echo $dat['descripcion'] ?>">
                </div>
                <div class="form-group col-md-12">
                    <label for="precio">Precio:</label>
                    <input name="precio" type="number" class="form-control" id="precio" placeholder="Precio del Producto" value="<?php echo $dat['precio'] ?>">
                </div>
            </div>
        <?php } ?>
        <div class="form-group">
            <label for="admi_img_perfil">Categorias:</label>
            <button class="btn btn-info d-block" type="button" data-toggle="modal" data-target="#categoria">Selecione Categorias</button>
        </div>
        <div class="modal-footer">
            <a href="productos" class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</a>
            <button type="submit" class="btn btn-primary" name="actu_producto" id="actu_producto">Actualizar</button>
        </div>
        </form>
</div>


<?php require_once 'vistas/end.php' ?>

<?php
if (isset($_POST['actu_producto'])) {
    include 'conexion_db.php';
    $consul = "SELECT * FROM producto WHERE id='$id'";
    $result= mysqli_query($conexion, $consul);
    $arr = mysqli_fetch_array($result);
    $id_db = $arr['id'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];


    $query = "UPDATE producto SET titulo='$titulo',descripcion='$descripcion',precio='$precio' WHERE id='$id_db'";
    $respuesta = mysqli_query($conexion, $query);

    if ($respuesta) {
        echo "<script>
      Swal .fire({
      title: 'Datos actualizados',
      text: 'Los datos del producto se realizaron satisfactoriamente',
      icon: 'success',
      confirmButtonText: 'Aceptar',
    }).then(resultado => {
      if (resultado.value) {
          // Hicieron click en 'Sí'
          window.location.href='productos';
      }else{
          window.location.href='productos';
      }
    });
          </script>";
    } else {
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
            icon: 'error',
            title: 'Hubo un error al actulizar datos'
          });
          </script>";
    }
}
?>

<html>
<!-- /*  if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
        $check = getimagesize($_FILES['actu_foto_pd']['tmp_name']);
        if ($check !== false) {
            $carpeta_destino = 'foto_produc/';
            $archivo_subido = $carpeta_destino . $_FILES['actu_foto_pd']['name'];
            move_uploaded_file($_FILES['actu_foto_pd']['tmp_name'], $archivo_subido);
        } else {
            echo "<script>Swal.fire({
        icon: 'info',
        title: 'Imagen',
        html: '<p>El archivo no es una imagen o pesa demasiado</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      });
      </script>";
            exit();
        }
    }
    $edit_foto = $_FILES['actu_foto_pd']['name']; */ -->

</html>