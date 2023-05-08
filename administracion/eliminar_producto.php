<?php
//session_start();
include_once  'conection.php';
$ID_PRODUCTO=$_GET["id_producto"];


// Sentencia SQL para eliminar el producto deseado
$sql = "DELETE FROM PRODUCTO WHERE ID_PRODUCTO = '$ID_PRODUCTO'";

// Ejecutar la sentencia SQL
if(mysqli_query($conn, $sql)) {
   header("Location: /sprint2/administracion/mostrar_productos.php");
   exit();
} else {
    echo "Error al eliminar el producto: " . mysqli_error($conn);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>