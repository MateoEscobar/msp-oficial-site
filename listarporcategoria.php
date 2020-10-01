<?php
// recogemos el parametro ID
$Idcat = $_POST["Id"];
// incluimos la conexión a la base de datos
include 'conexion_db.php';
// verificamos si el id no esta vacío
if(!empty($Idcat)){
    // si no lo esta generamos la consulta mysql
    $consulta = "SELECT p.* FROM producto p inner join categoriasasociadas c on c.idproducto = p.id where c.idcategoria = '$Idcat' ";
    // ejecutamos la consulta
    $resultado = mysqli_query($conexion, $consulta);
    //contador inicial
    $contador = 0;
    // datos recogidos
    $data = array();
    // contador para el total en el resultado
    $total =  $resultado->num_rows;
    // Guardamos la consulta en un array asociativo y recorremos este
    if($total > 0){
        while ($fila = mysqli_fetch_assoc($resultado)) {
            // GUARDAMOS EN UN ARRAY EN LA POSICION DEL CONTADOR LOS DATOS TRAIDOS DE LA BASE DE DATOS
            $data[$contador] = array(
                "id" => $fila["id"],
                "titulo" => $fila["titulo"],
                "descripcion" => $fila["descripcion"],
                "precio" => $fila["precio"],
                "fecha" => $fila["fecha"],
                "foto" => $fila["foto"],
                "codigo_produc" => $fila["codigo_produc"],
                "estado" => $fila["estado"]
            );
            // Cada que se ejecute el ciclo aunmenta el contador a +1
            $contador++;
        }
        //  devolvemos una array con los datos
        $salida = array(
            "sEcho" => "Correcto",
            "aaData" => $data,
            "Mensaje" => "Se ha generado la consulta correctamente.",
            "totalData" => $contador
        );
    }else{
        // como esta vacio devolvemos una array con los datos
        $salida = array(
            "sEcho" => "Incorrecto",
            "aaData" => null,
            "Mensaje" => "No hay productos disponibles para esta categoría"
        );
    }
    // Codificamos a json el array anterior
    echo json_encode($salida);
}else{
    // como esta vacio devolvemos una array con los datos
    $salida = array(
      "sEcho" => "Incorrecto",
      "aaData" => null,
      "Mensaje" => "No se ha enviado el parametro Id"
    );
    // Codificamos a json el array anterior
    echo json_encode($salida);
}
?>