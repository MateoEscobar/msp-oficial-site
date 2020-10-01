<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

</html>

<?php
include '../../conexion_db.php';
include 'index.php';
$user = $_POST['usuario'];
$pdw = $_POST['password'];
if (isset($_POST['submit-btn'])) {
  if (empty($user)) {
    echo "
        <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 8000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'error',
            title: 'El usuario no puede estar vacio'
          })
        </script>
        ";
    exit();
  }
  if (strlen($user) < 3) {
    echo "
        <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 8000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'error',
            title: 'El usuario es muy corto'
          })
        </script>
        ";
    exit();
  }
  if (empty($pdw)) {
    echo "
        <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 8000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'error',
            title: 'La Contraseña no puede estar vacio'
          })
        </script>
        ";
    exit();
  }
  if (strlen($pdw) < 8) {
    echo "
        <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 8000,
            timerProgressBar: true,
            onOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'error',
            title: 'La Contraseña a de tener minimo 8 caracteres'
          })
        </script>
        ";
    exit();
  }
}
$consulta = "SELECT * FROM administradores WHERE email='$user' and password='$pdw'";
$resultado = mysqli_query($conexion, $consulta);
/*  $array = mysqli_fetch_row($resultado);
 */ $array2 = mysqli_fetch_array($resultado);
if ($array2){
  $_SESSION['usuario'] = $array2['usuario'];
  $_SESSION['admin_name'] = $array2['nombre'];
  $_SESSION['admin_ape'] = $array2['apellidos'];
  echo "<script>
  Swal .fire({
  title: 'Inicio Correcto',
  text: 'Se ha iniciado sesión con éxito',
  icon: 'success',
  confirmButtonText: 'Perfil',
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
  echo "
        <script>
        Swal.fire(
          'Inicio de sesion erroneo',
          'Hubo un error al iniciar sesion, por favor comprueba el ususario y la contraseña o contacte con el administrador',
          'error'
        )
        </script>
        ";
}
mysqli_close($conexion);

?>