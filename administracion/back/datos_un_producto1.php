<?php
include_once dirname(__DIR__) . '/conection.php';

$idProducto = $_GET["id_producto"];

$sql = "SELECT * FROM PRODUCTO JOIN CATEGORIA ON PRODUCTO.ID_CATEGORIA = CATEGORIA.ID_CATEGORIA WHERE ID_PRODUCTO = $idProducto";

$resultado = mysqli_query($conn, $sql);

// Verificar si se encontraron resultados
if (mysqli_num_rows($resultado) > 0) {
    // Obtener los datos del producto y guardarlos en la variable $producto
    $producto = mysqli_fetch_assoc($resultado);
} else {
    header("Location: /mostrar_productos");
    exit();
}
 ?>