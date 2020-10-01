<?php require_once 'vistas/start.php';
include 'conexion.php';

$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, categoria FROM categorias";

$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data = $resultado->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

</html>
<div class="container">
    <h1>Categorias</h1>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <p class="bg-warning text-white p-3 font-weight-bold font-si">Listado de Categorias de los productos</p>
                <div class="row-1">
                    <button type="button" name="nuevaCategoria" class="btn btn-primary text-white mb-3" data-toggle="modal" data-target="#nuevaCategoria">Añadir nueva Categoria</button>
                </div>  
                <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                    <thead class="">
                        <tr>
                            <th>Id</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($data as $dat) {
                        ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['categoria'] ?></td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <div>
                                            <button type="button" class="btn btn-primary mr-3"><i class="fas fa-pencil-alt"></i></button>
                                            <button type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
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
<!-- Modal -->
<div class="modal fade" id="nuevaCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nueva categoria</h5>
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
        <div class="modal-footer">
            <a href="productos" class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</a>
            <button type="submit" class="btn btn-primary" name="agre_producto" id="agre_producto">Agregar</button>
        </div>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
<?php require_once 'vistas/end.php' ?>