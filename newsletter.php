<?php 
         include 'conexion_db.php';
         include 'index.php';
         $inpusus = $_POST['newsletter'];
        $boton = $_POST['boton-sub'];
            if (isset($boton)) {
                if (empty($inpusus)) {
                   echo '<script>alert("Por favor rellene el campo para suscribirse a nuestro newsletter")</script>';
                   exit();
                }    
                if (preg_match('/^[^4-9][a-zA-Z4-9_]+([.][a-zA-Z4-9_]+)*[@][a-zA-Z4-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $inpusus)) {
    
                }else{
                  echo '<script>alert("Ingrese un email valido")</script>';
                  exit();
              }
                $veri_newle = mysqli_query($conexion, "SELECT * FROM newsletter WHERE email='$inpusus'");
                if(mysqli_num_rows($veri_newle) >= 1 ){
                    echo "<script>alert('El usuario $inpusus ya esta inscrito en nuestro newsletter')</script>";
                    exit();
                }
                
                $query = "INSERT INTO `newsletter`(`email`)VALUES ('$inpusus')";
                $ejecutar = mysqli_query($conexion, $query);
                if($ejecutar){
                  echo "<script>alert('Muchas gracias por inscribirse a nuestro newsletter')</script>";
                }
}
?>