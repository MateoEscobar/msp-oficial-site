<!-- Incio del contenido -->
<?php require_once 'vistas/start.php'; ?>
<div class="container">
    <h1>Busqueda de Clientes</h1>
    <?php
    include_once 'conexion.php';
    $busqueda = strtolower($_REQUEST['busqueda']);
    if (empty($busqueda)) {
        echo "
        <script>window.location.href='dashboard'</script>
        ";
    }
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    /*  $consulta = "SELECT id, nombre, apellidos, email, telefono, estado FROM usuarios"; */

    $consulta = "SELECT id, nombre, apellidos, email, telefono, estado FROM usuarios
                        WHERE ( id LIKE '$busqueda' 
                        OR nombre LIKE '%$busqueda%' 
                        OR apellidos LIKE '%$busqueda%'
                        OR email LIKE '%$busqueda%'
                        OR telefono LIKE '$busqueda' 
                        OR estado LIKE '$busqueda');";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Email</th>
                                <th>Teléfono</th>
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
                                    <td><?php echo $dat['nombre'] ?></td>
                                    <td><?php echo $dat['apellidos'] ?></td>
                                    <td><?php echo $dat['email'] ?></td>
                                    <td><?php echo $dat['telefono'] ?></td>
                                    <td><?php echo $dat['estado'] ?></td>
                                    <td>
                                        <a href="actualizar.php?id=<?php echo $dat['id']; ?>" class="btn btn-success float-left text-white">Editar</a>
                                        <a href="eliminar.php?id=<?php echo $dat['id']; ?>" class="btn btn-danger float-right text-white">Eliminar</a>
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
    </body>

    </html>
</div>
<?php require_once 'vistas/end.php'; ?>