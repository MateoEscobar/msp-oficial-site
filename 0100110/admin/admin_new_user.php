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
include 'dashboard.php';
include 'conexion_db.php';
  if (isset($_POST['ad_regist'])) {
  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $phone = $_POST['phone'];
  $date = date("d/m/Y"); 
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    @$check = getimagesize($_FILES['admi_img_perfil']['tmp_name']);
    if ($check !== false) {
        $carpeta_destino = '../../fotos/';
        $archivo_subido = $carpeta_destino . $_FILES['admi_img_perfil']['name'];
        move_uploaded_file($_FILES['admi_img_perfil']['tmp_name'], $archivo_subido);
    }
}
$img_perfil = $_FILES['admi_img_perfil']['name'];

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
$veri_phone = mysqli_query($conexion, "SELECT * FROM usuarios WHERE telefono='$phone'");
if (mysqli_num_rows($veri_phone) >= 1) {
    echo "<script>Swal.fire({
    icon: 'error',
    title: 'Teléfono en uso',
    html: '<p style=color:red;>El Numero $phone  ya esta en uso</p>',
    footer: '<b>© Todos los derechos reservados msp 2020</b>'
  });
  </script>";
    exit();
}

$hash = password_hash($password, PASSWORD_DEFAULT, ['cost' => 14]);
$hash2 = $hash;

$query = "INSERT INTO `usuarios`(`nombre`, `apellidos`, `email`, `password`, `password2`, `telefono`,`img_perfil`,`fecha_reg`)VALUES ('$nombre','$apellidos','$email','$hash','$hash2','$phone','$img_perfil','$date')";
$ejecutar = mysqli_query($conexion, $query);
//verificaccion  del correo en la bd

if ($ejecutar) {
    echo "<script>
    Swal .fire({
    title: 'Registro correcto',
    text: 'Usuario registrado satisfactoriamente',
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
    echo "<script>
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