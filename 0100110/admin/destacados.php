<?php  require_once 'vistas/start.php' ?>
<?php
    include_once 'conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT * FROM destacados ORDER BY id DESC";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>
<div class="container">
<h1>Listado de Productos Destacados</h1>
<div class="row">
            <div class="col-lg-12">
            <a href="agregar" type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#nuevoDest">Nuevo Producto</a>
            </div>
        </div>
<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Titulo</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Categoria_Id</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data as $dat) {
                            ?>
                                <tr>
                                    <td><?php echo $dat['id'] ?></td>
                                    <td><?php echo $dat['titulo'] ?></td>
                                    <td><?php echo $dat['descripcion'] ?></td>
                                    <td><?php echo $dat['precio'].'€' ?></td>
                                    <td><?php echo $dat['categoria_id'] ?></td>
                                    <td><?php echo $dat['fecha'] ?></td>
                                    <td><?php echo $dat['estado'] ?></td>
                                    <td>

                                        <a href="actualizar_prod.php?id=<?php echo $dat['id']; ?>" class="btn btn-success float-left text-white mb-1">Editar</a>
                                        <a href="eliminar.php?id=<?php echo $dat['id']; ?>" class="btn btn-danger float-right text-white">Eliminar</a>
                                    </td>
                                  
                                </tr>
                            <?php
                            }
                        
                            ?>  <?php
                                     if(@$dat==''){
                                        echo "<h2 style='color:#cacaca;'>No se ha encontrado Ningún Producto</h2>";
                                        echo "<a href='productos' class='boton-in'>Volver</a>";
                                    }
                                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="nuevoDest" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="titulo">Titulo:</label>
                <input name="titulo" type="text" class="form-control" id="titulo" placeholder="Titulo del Producto">
            </div>
            <div class="form-group col-md-12">
                <label for="descripcion">Descripción:</label>
                <input name="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion del Producto">
            </div>
            <div class="form-group col-md-12">
                <label for="precio">Precio:</label>
                <input name="precio" type="number" class="form-control" id="precio" placeholder="Precio del Producto">
            </div>
            <div class="form-group col-md-12">
                <label for="foto">Foto:</label>
                <input type="file" class="form-control-file" id="foto_prod" name="foto_prod"> </div>
        </div>
        <div class="form-group">
            <label for="admi_img_perfil">Categorias:</label>
            <button class="btn btn-info d-block" type="button" data-toggle="modal" data-target="#categoria">Selecione Categorias</button>
        </div>
            <div class="modal-footer">
            <a href="productos" class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</a>
            <button type="submit" class="btn btn-primary" name="agre_producto" id="agre_producto">Agregar</button>
        </div>
    </form>
      </div>
    </div>
  </div>
</div>
</body>

</html>
<?php

if (isset($_POST['agre_producto'])) {
  include 'conexion_db.php';
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $precio = $_POST['precio'];
  $code_unic=uniqid();
  $date = date("d/m/Y");

  if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {
    $check = getimagesize($_FILES['foto_prod']['tmp_name']);
    if ($check !== false) {
        $carpeta_destino = 'foto_produc/';
        $archivo_subido = $carpeta_destino . $_FILES['foto_prod']['name'];
        move_uploaded_file($_FILES['foto_prod']['tmp_name'], $archivo_subido);
    }
}$foto_prod = $_FILES['foto_prod']['name'];

$query = "INSERT INTO `destacados`(`titulo`, `descripcion`, `precio`,  `fecha`, `foto`,`codigo_produc`) VALUES ('$titulo','$descripcion','$precio','$date','$foto_prod','$code_unic')";
$ejecutar = mysqli_query($conexion, $query);
  //verificaccion  del correo en la bd

  if ($ejecutar) {
    echo "<script>
        Swal .fire({
        title: 'Registro correcto',
        text: 'Producto registrado satisfactoriamente',
        icon: 'success',
        confirmButtonText: 'Aceptar',
    }).then(resultado => {
        if (resultado.value) {
            // Hicieron click en 'Sí'
            window.location.href='agregar';
        }else{
            window.location.href='agregar';
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
        </script>
    ";
  }
  mysqli_close($conexion);
}
?>

<?php  require_once 'vistas/end.php' ?>