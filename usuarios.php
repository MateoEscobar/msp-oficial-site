<?php
session_start();
$email = $_SESSION['email'];
if (isset($email)) {
  header('location: profile');
  exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</html>

<?php
if (isset($_POST['registro'])) {
  include 'conexion_db.php';
  include 'registrarse.php';

  $nombre = $_POST['nombre'];
  $apellidos = $_POST['apellidos'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $phone = $_POST['phone'];
  $date = date("d/m/Y");

  if (empty($nombre)) {
    echo "<script>Swal.fire({
        icon: 'error',
        title: 'Nombre Invalido',
        html: '<p style=color:red;>Por favor rellene el campo nombre</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      });
      </script>";
    exit();
  }
  if (strlen($nombre) < 3) {
    echo "<script>Swal.fire({
        icon: 'error',
        title: 'Nombre Invalido',
        html: '<p style=color:red;>Ingrese un Nombre valido. ejemplo: Jose, recuerde que el nombre a de tener mas de 3 caracteres</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      });
      </script>";
    exit();
  }
  if (preg_match('/[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?)*/', $nombre)) {
  } else {
    echo "<script>Swal.fire({
        icon: 'error',
        title: 'Nombre Invalido',
        html: '<p style=color:red;>Ingrese un nombre valido, sin caracteres especiales</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      });
      </script>";
    exit();
  }

  if (empty($apellidos)) {
    echo "<script>Swal.fire({
        icon: 'error',
        title: 'Apellido Invalido',
        html: '<p style=color:red;>Por favor rellene el campo apellido</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      });
      </script>";
    exit();
  }
  if (preg_match('/[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?)*/', $apellidos)) {
  } else {
    echo "<script>Swal.fire({
        icon: 'error',
        title: 'Apellido Invalido',
        html: '<p style=color:red;>Ingrese un apellido valido. Sin caracteres especiales</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      });
      </script>";
    exit();
  }
  if (strlen($apellidos) < 3) {
    echo "<script>Swal.fire({
        icon: 'error',
        title: 'Apellido Invalido',
        html: '<p style=color:red;>El apellido a de tener 3 o mas carácteres</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      });
      </script>";
    exit();
  }
  if (empty($email)) {
    echo "<script>Swal.fire({
        icon: 'error',
        title: 'Email Invalido',
        html: '<p style=color:red;>Rellene el campo email. ejemplo: correo@correo.com</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      });
      </script>";
    exit();
  }
  if (preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $email)) {
  } else {
    echo "<script>Swal.fire({
        icon: 'error',
        title: 'Email Invalido',
        html: '<p style=color:red;>Ingrese un email valido. ejemplo: correo@correo.com</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      });
      </script>";
    exit();
  }
  if (strlen($password) < 8) {
    echo "<script>Swal.fire({
        icon: 'info',
        title: 'Contraseña no valida',
        html: '<p style=color:red;>La contraseña a de tener 8 o más carácteres</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      });
      </script>";
    exit();
  }
  if (preg_match('/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/', $password)) {
  } else {
    echo "<script>Swal.fire({
        icon: 'error',
        title: 'Contraseña no valida',
        html: '<p style=color:red;>La contraseña debe tener al entre 8 y 16 carácteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      });
      </script>";
    exit();
  }
  if ($password == $password2) {
  } else {
    echo "<script>Swal.fire({
        icon: 'error',
        title: 'Las contraseñas no coinciden',
        html: '<p style=color:red;>Las conotraseñas han de ser completamente iguales</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      });
      </script>";
    exit();
  }
  if (empty($phone)) {
    echo "<script>Swal.fire({
        icon: 'error',
        title: 'Telefono no valido',
        html: '<p style=color:red;>El campo no puede estar vacio</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      });
      </script>";
    exit();
  }
  if (preg_match('/0{0,2}([\+]?[\d]{1,3} ?)?([\(]([\d]{2,3})[)] ?)?[0-9][0-9 \-]{6,}( ?([xX]|([eE]xt[\.]?)) ?([\d]{1,5}))?/', $phone)) {
  } else {
    echo "<script>Swal.fire({
        icon: 'error',
        title: 'Telefono no valido',
        html: '<p style=color:red;>Ingrese un telefono valido</p>',
        footer: '<b>© Todos los derechos reservados msp 2020</b>'
      });
      </script>";
    exit();
  }

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    $check = getimagesize($_FILES['img_perfil']['tmp_name']);
    if ($check !== false) {
        $carpeta_destino = 'fotos/';
        $archivo_subido = $carpeta_destino . $_FILES['img_perfil']['name'];
        move_uploaded_file($_FILES['img_perfil']['tmp_name'], $archivo_subido);
    }
}$img_perfil = $_FILES['img_perfil']['name'];

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
    $_SESSION['email2'] = $email;
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