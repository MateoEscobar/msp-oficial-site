<?php
@session_start();
$email = $_SESSION['email'];
if (!isset($email)) {
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

if(isset($_POST['cambiar_foto'])){
if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    $check = getimagesize($_FILES['edit_perfil']['tmp_name']);
    if ($check !== false) {
        $carpeta_destino = 'fotos/';
        $archivo_subido = $carpeta_destino . $_FILES['edit_perfil']['name'];
        move_uploaded_file($_FILES['edit_perfil']['tmp_name'], $archivo_subido);
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
$edit_foto = $_FILES['edit_perfil']['name'];
$actualizar  = "UPDATE usuarios SET img_perfil='$edit_foto' WHERE email='$email'";
$resultado = mysqli_query($conexion, $actualizar);
if($resultado){
  echo "<script>
  Swal .fire({
  title: 'Foto de perfil actualizada',
  text: 'La foto del perfil se cambio satisfactoriamente',
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