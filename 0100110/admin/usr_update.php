<?php
@session_start();
$email_foto =$_SESSION['email_perfil'];
$mail = $_SESSION['email'];
if (!isset($mail)) {
    header('location: login');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</html>
<?php
include 'conexion_db.php';
include 'user-config.php';
$consulta = "SELECT * FROM usuarios WHERE email='$email'";
$resultado = mysqli_query($conexion, $consulta);
$array = mysqli_fetch_array($resultado);
$email_db = $array['email'];

if (isset($_POST['enviar_datos_act'])){
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];

    $actualizar  = "UPDATE usuarios SET nombre='$nombre' ,apellidos='$apellidos' WHERE email='$email_db'";
    $resultado = mysqli_query($conexion, $actualizar);

    if($resultado){
      echo "<script>
      Swal .fire({
      title: 'Datos actualizados',
      text: 'Los cambios se realizaron satisfactoriamente',
      icon: 'success',
      confirmButtonText: 'Aceptar',
    }).then(resultado => {
      if (resultado.value) {
          // Hicieron click en 'Sí'
          window.location.href='user-config';
      }else{
          window.location.href='user-config';
      }
    });
          </script>";
    }else{
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