<?php
@session_start();
$email = $_SESSION['usuario'];
if (!isset($email)) {
    header('location: index');
}
?>
<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</html>

<?php
include 'conexion_db.php';
require_once 'actualizar.php';

if (isset($_POST['ad_num'])){
    $phone = $_POST['phone'];
    $email_db =  $_SESSION['admin_em'];
    $veri_phone = mysqli_query($conexion, "SELECT * FROM usuarios WHERE telefono='$phone'");
    if (mysqli_num_rows($veri_phone) >= 1) {
        echo "<script>Swal.fire({
        icon: 'error',
        title: 'Teléfono en uso',
        html: '<p style=color:red;>El Numero $phone ya esta en uso</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      });
      </script>";
        exit();
    }
    $actualizar  = "UPDATE usuarios SET telefono='$phone' WHERE email='$email_db'";
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
          window.location.href='dashboard';
      }else{
          window.location.href='dashboard';
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