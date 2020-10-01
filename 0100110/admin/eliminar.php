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
    <h1>Eminar Usuario</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <p class="bg-warning text-white p-3 font-weight-bold font-si">Esta a punto de elimnar el cliente <?php foreach ($data as $eli) {
                                                                                                                        echo $eli['nombre'] . ' ';
                                                                                                                    }; ?> <b class="text-danger">¿Está seguro?</b> </p>
                <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $dat) {
                            $_SESSION['mail_dele'] = $dat['email'];
                        ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['apellidos'] ?></td>
                                <td><?php echo $dat['email'] ?></td>
                                <td><?php echo $dat['telefono'] ?></td>
                                <td><?php echo $dat['estado'] ?></td>
                                <td>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <div class="modal-footer">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
                        <a href="dashboard" class="btn btn-secondary float-left text-white">Cancelar</a>
                        <button type="submit" name="delete_usr" class="btn btn-danger float-right text-white ml-3">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ----------------------- -->
<?php
include '../../conexion_db.php';
if (isset($_POST['delete_usr'])) {
    $delemail = $_SESSION['mail_dele'];
    $actualizar  = "DELETE FROM `usuarios` WHERE email LIKE '$delemail'";
    $result = mysqli_query($conexion, $actualizar);
    if ($result) {
        echo "<script>
      Swal .fire({
      title: 'Usuario Eliminado',
      text: 'Se eliminó el usuario satisfactoriamente',
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
            title: 'Hubo un error al eliminar datos'
          });
          </script>";
    }
}
?>
<?php require_once 'vistas/end.php' ?>