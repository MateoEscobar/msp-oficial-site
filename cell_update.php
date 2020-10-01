<?php
@session_start();
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

if (isset($_POST['update_cell'])){
    $phone = $_POST['phone'];

    $veri_phone = mysqli_query($conexion, "SELECT * FROM usuarios WHERE telefono='$phone'");
    if (mysqli_num_rows($veri_phone) >= 1) {
        echo "<script>Swal.fire({
        icon: 'error',
        title: 'Teléfono en uso',
        html: '<p style=color:red;>El Numero $telefono ya esta en uso</p>',
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