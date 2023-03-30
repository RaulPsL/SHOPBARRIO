<?php
include_once dirname(__DIR__) . '/conection.php';

// Ejecutar una consulta SELECT
$sql = "SELECT SUM(TOTAL_VENTA) AS TOTAL FROM VENTA WHERE ID_TIENDA = 1";
$resultado = mysqli_query($conn, $sql);

// Verificar si se encontraron resultados
if (mysqli_num_rows($resultado) > 0) {
    // Recorrer los resultados y mostrarlos
    while($fila = mysqli_fetch_assoc($resultado)) {
        echo "<script>console.log('Nombre: " . $fila['TOTAL'] . "')</script>";
        $venta_historico=$fila['TOTAL'];
    }
} else {
    echo "<script>console.log('No se encontraron resultados')</script>";
}