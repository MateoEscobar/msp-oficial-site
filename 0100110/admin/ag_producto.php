
<?php
if (isset($_POST['registro'])) {
  include 'conexion_db.php';
  
  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $phone = $_POST['phone'];
  $date = date("d/m/Y");
  
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    $check = getimagesize($_FILES['img_perfil']['tmp_name']);
    if ($check !== false) {
        $carpeta_destino = 'fotos/';
        $archivo_subido = $carpeta_destino . $_FILES['img_perfil']['name'];
        move_uploaded_file($_FILES['img_perfil']['tmp_name'], $archivo_subido);
    }
}$img_perfil = $_FILES['img_perfil']['name'];

$query = "INSERT INTO `producto`(`titulo`, `descripcion`, `precio`,  `fecha`, `foto`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])";
$ejecutar = mysqli_query($conexion, $query);
  //verificaccion  del correo en la bd

  if ($ejecutar) {
    echo "<script>
        Swal .fire({
        title: 'Registro correcto',
        text: 'Usuario registrado satisfactoriamente',
        icon: 'success',
        confirmButtonText: 'Iniciar sesión',
    }).then(resultado => {
        if (resultado.value) {
            // Hicieron click en 'Sí'
            window.location.href='login';
        }else{
            window.location.href='login';
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
            window.location = 'registrarse';
        </script>
    ";
  }

  mysqli_close($conexion);
}
?>