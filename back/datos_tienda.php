<?php
include_once '../contenido/conection.php';

// Ejecutar una consulta SELECT
$sql = "SELECT NOMBRE_TIENDA FROM TIENDA WHERE ID_TIENDA = 1";
$resultado = mysqli_query($conn, $sql);

// Verificar si se encontraron resultados
if (mysqli_num_rows($resultado) > 0) {
    // Recorrer los resultados y mostrarlos
    while($fila = mysqli_fetch_assoc($resultado)) {
        echo "<script>console.log('Nombre: " . $fila['NOMBRE_TIENDA'] . "')</script>";
        $nombre=$fila['NOMBRE_TIENDA'];
    }
} else {
    echo "<script>console.log('No se encontraron resultados')</script>";
}