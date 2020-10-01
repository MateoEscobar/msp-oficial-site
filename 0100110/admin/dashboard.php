<?php
@session_start();
$email = $_SESSION['usuario'];
if (!isset($email)) {
    header('location: index');
}
?>
<!-- Incio del contenido -->
<?php require_once 'vistas/start.php';
?>
<div class="container">


    <div class="d-flex justify-content-between">
        <h1 class="float-left">Clientes</h1>
        <div class="filtro">
            <label for="filtrar" class="d-block">Mostrar Primero</label>
            <select name="filtrar" id="filtrar">
                <option value="">Más Nuevos</option>
                <option value="">Más Recurrentes</option>
                <option value="">Más Antiguos</option>
            </select>
        </div>

    </div>
    <?php
    include_once 'conexion.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();

    $consulta = "SELECT * FROM usuarios ORDER BY id DESC";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#nuevoCliente">Nuevo Cliente</button>
            </div>
        </div>
    </div>
    <br>
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
                                <th>Fecha RGS</th>
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
                                    <td><?php echo $dat['fecha_reg'] ?></td>
                                    <td>

                                        <a href="actualizar.php?id=<?php echo $dat['id']; ?>" class="btn btn-success float-left text-white">Editar</a>
                                        <a href="eliminar.php?id=<?php echo $dat['id']; ?>" class="btn btn-danger float-right text-white">Eliminar</a>



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

    <!--Modal para CRUD-->
    <!-- Modal -->
    <div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-uppercase">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo cliente</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form action="admin_new_user.php" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre:</label>
                                <input required name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre de el cliente">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="apellido">Apellido:</label>
                                <input required name="apellidos" type="text" class="form-control" id="Apellido" placeholder="Apellido de el cliente">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="inputEmail4">Email:</label>
                                <input required name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email de el cliente">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Contraseña:</label>
                                <input required name="password" type="password" class="form-control" id="inputPassword4" placeholder="Contraseña">
                                <button class="btn btn-secondary mt-2" type="button" onclick="generar();"><i class="fas fa-key"></i></button>
                                <button id="show_password" class="btn btn-primary mt-2" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>

                            </div>
                           
                            <div class="form-group col-md-6">
                                <label for="inputPassword5">Repita la Contraseña:</label>
                                <input required name="password2" type="password" class="form-control" id="inputPassword5" placeholder="Contraseña">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="telefono">Teléfono:</label>
                                <input required name="phone" type="tel" class="form-control" id="telefono" placeholder="Número de movil de el cliente ">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="admi_img_perfil">Foto de perfil:</label>
                            <input type="file" class="form-control-file" id="admi_img_perfil" name="admi_img_perfil">
                        </div>
                        <div class="modal-footer"><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                            <input type="submit" class="btn btn-primary" type="button" name="ad_regist" value="Agregar">
                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</body>

</html>

<?php require_once 'vistas/end.php'; ?>