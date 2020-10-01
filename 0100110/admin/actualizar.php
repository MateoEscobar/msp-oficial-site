<?php
@session_start();
$email = $_SESSION['usuario'];
if (!isset($email)) {
    header('location: index');
}
?>
<?php require_once 'vistas/start.php';
include 'conexion.php';
@$id = $_GET['id'];

$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, nombre, apellidos, email, telefono, estado FROM usuarios
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
    <h1>Editar Usuario</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        <div class="form-row">
            <?php foreach ($data as $dat) {
                $_SESSION['admin_em'] = $dat['email'];
            ?>
                <div class="form-group col-md-6">
                    <label for="nombre">Nombre:</label>
                    <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre de el cliente" value="<?php echo $dat['nombre'] ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="apellido">Apellido:</label>
                    <input name="apellidos" type="text" class="form-control" id="Apellido" placeholder="Apellido de el cliente" value="<?php echo $dat['apellidos'] ?>">
                </div>
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Email:</label>
                    <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="<?php echo $dat['email'] ?>" disabled>
                </div>
        </div>
        <div class="modal-footer">
            <input type="submit" class="btn btn-primary" type="button" name="ad_regist" value="Actualizar">
        </div>
        <?php
            }
        ?>
        </form>
        <div class="form-row">
            <form action="cell_update" method="POST">
                <label for="telefono">Teléfono:</label>
                <input name="phone" type="tel" class="form-control" id="telefono" placeholder="Número de movil de el cliente " value="<?php echo $dat['telefono'] ?>">
                <br> <input type="submit" class="btn btn-primary float-right" type="button" name="ad_num" id="ad_num" value="Actualizar Movil">
                <a href="dashboard" class="btn btn-secondary float-right mr-2" type="button">Cancelar</a>
            </form>
        </div>
    

</div>


<!-- ----------------------- -->
<?php
include '../../conexion_db.php';

if (isset($_POST['ad_regist'])) {

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $telefono = $_POST['phone'];
    $admin_em = $_SESSION['admin_em'];

    $veri_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='$email'");
    if (mysqli_num_rows($veri_correo) >= 1) {
        echo "<script>Swal.fire({
        icon: 'error',
        title: 'Usuario en uso',
        html: '<p style=color:red;>El usuario $email ya esta en uso</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      });
      </script>";

        exit();
    }
    $actualizar  = "UPDATE usuarios SET nombre='$nombre' ,apellidos='$apellidos' WHERE email='$admin_em'";
    $result = mysqli_query($conexion, $actualizar);
    if ($result) {
        echo "<script>
      Swal .fire({
      title: 'Datos actualizados',
      text: 'Los cambios se realizaron satisfactoriamente',
      icon: 'success',
      confirmButtonText: 'Aceptar',
    }).then(resultado => {
      if (resultado.value) {
          // Hicieron click en 'Sí'
          window.location.href='dashboard';
      }else{
          window.location.href='dashboard';
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
<?php require_once 'vistas/end.php' ?>