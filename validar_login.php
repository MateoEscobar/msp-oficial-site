<?php
session_start();
if (isset($_SESSION['email'])) {
  header('location: profile');
  exit();
}
if (isset($_POST['btn-sigini'])) {
  include 'conexion_db.php';
  include 'login.php';
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (empty($email)) {
    echo "<script>
    Swal.fire({
      title: 'Email invalido:',
      html: '<p style=color:red;>Por favor rellene el campo Email</p>',
      icon: 'error',
      confirmButtonText: 'OK',
      customClass: {
        icon: 'icon-class',
        html: 'horario-class',
        title: 'title-class',
        header: 'header-class'
      }
    })</script>";
    exit();
  }
  if (empty($password)) {
    echo "<script>
    Swal.fire({
      title: 'Contraseña invalida:',
      html: '<p style=color:red;>Por favor rellene el campo contraseña</p>',
      icon: 'error',
      confirmButtonText: 'OK',
      customClass: {
        icon: 'icon-class',
        html: 'horario-class',
        title: 'title-class',
        header: 'header-class'
      }
    })</script>";
    exit();
  }
  $consulta = "SELECT * FROM usuarios WHERE email='$email'";
  $resultado = mysqli_query($conexion, $consulta);
  $array = mysqli_fetch_array($resultado);

  if (password_verify($password, $array['password'])) {
    $_SESSION['nombre'] = $array['nombre'];
    $_SESSION['apellidos'] = $array['apellidos'];
    $_SESSION['email'] = $email;
    $_SESSION['telefono'] = $array['telefono'];
    $_SESSION['img_perfil'] = $array['img_perfil'];
    $_SESSION['email_perfil'] = $array['email'];
    $id= $array['id'];
    $_SESSION['id'] = $id;
    echo "<script>
    Swal .fire({
    title: 'Inicio Correcto',
    text: 'Se ha iniciado sesión con éxito',
    icon: 'success',
    confirmButtonText: 'Perfil',
}).then(resultado => {
    if (resultado.value) {
        // Hicieron click en 'Sí'
        window.location.href='profile';
    }else{
        window.location.href='profile';
    }
});
        </script>";
  } else {
    echo "<script>Swal.fire({
    icon: 'error',
    title: 'Error Login',
    html: '<p style=color:red;>Email y/o contraseñas invalidos</p>',
    footer: '<b>© Todos los derechos reservados msp 2020</b>'
  });</script>";
  }
}
/* if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $email)) {
}else{
  echo '<h3 class="warning2">Ingrese un email valido</h3>';
  exit();

} */
/* $consulta = "SELECT COUNT(*) as contar FROM usuarios WHERE email='$email' and password='$password'";
$resultado = mysqli_query($conexion, $consulta);
$array = mysqli_fetch_array($resultado);  


$con = "SELECT * FROM usuarios";


  if($array['contar']>0){
  $_SESSION['email'] = $email;
  echo '<script>
  window.location ="profile.php"
  </script>';
}else{
  echo '<h3 class="warning2">Usuario y/o contraseña no validos</h3>';
} */


/* if($array['contar']>0){
  $_SESSION['email'] = $email;
  echo '<script>
  window.location ="profile.php"
  </script>';

}else{
  echo '<h3 class="warning2">Usuario y/o contraseña no validos</h3>';
} */

/* if(password_verify($password, $hash)){
  $_SESSION['email'] = $email;
  echo '<script>
  window.location ="profile.php"
  </script>';

}else{
  echo '<h3 class="warning2">Usuario y/o contraseña no validos</h3>';
}
 */

/* 
if($array['contar']>0){
  $_SESSION['email'] = $email;
  echo '<script>
  window.location ="profile.php"
  </script>';

}else{
  echo '<h3 class="warning2">Usuario y/o contraseña no validos</h3>';
}


 */
/* 

include 'conexion_db.php';
include 'login.php';
$email = $_POST['email'];
$password = $_POST['password'];

if(empty($email || $password)){
    echo '<h3 class="warning2">Los campos no pueden estar vacios</h3>';
    exit();
}
if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $email)) {
}else{
  echo '<h3 class="warning2">Ingrese un email valido</h3>';
  exit();
}

$consulta = "SELECT  * FROM usuarios WHERE email='$email' and password='$password'";
$resultado = mysqli_query($conexion, $consulta);

$array = mysqli_fetch_array($resultado);


$filas = mysqli_num_rows($resultado);

if($filas >= 1){
   echo '
   <script>
    window.location = "bienvenido.php";
   </script>
   ';
}else{
    echo '<h3 class="warning2">Usuario y/o contraseña no validos</h3>';
} */
