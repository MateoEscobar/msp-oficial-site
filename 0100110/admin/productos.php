<?php require_once 'vistas/start.php'?>
<?php
    include_once 'conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT * FROM producto ORDER BY id DESC";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>
<div class="container">
<h1>Listado de Productos</h1>
<div class="row">
            <div class="col-lg-12">
            <a href="agregar" type="submit" class="btn btn-primary mb-3">Nuevo Producto</a>
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
                                <th>Codigo</th>
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
                                $rest = substr($dat['descripcion'], -40);  
                        ?>
                        
                                <tr>
                                    <td><?php echo $dat['id'] ?></td>
                                    <td><?php echo $dat['codigo_produc'] ?></td>
                                    <td><?php echo $dat['titulo'] ?></td>
                                    <td><?php echo $rest ?></td>
                                    <td><?php echo $dat['precio'].'€' ?></td>
                                    <td><?php echo $dat['categoria_id'] ?></td>
                                    <td><?php echo $dat['fecha'] ?></td>
                                    <td><?php echo $dat['estado'] ?></td>
                                    <td>
   
                                        <a href="actualizar_prod.php?id=<?php echo $dat['id']; ?>" class="btn btn-success mb-1"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="eliminar_pro.php?id=<?php echo $dat['id']; ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                        
                                    </td>
                                </tr>
                            <?php
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
</script>
</body>

</html>



<?php require_once 'vistas/end.php'?>






  
    