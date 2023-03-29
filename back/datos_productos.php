<?php
include_once dirname(__DIR__) . '/conection.php';

// Ejecutar una consulta SELECT
$sql = "SELECT ID_PRODUCTO, NOMBRE_PRODUCTO, PRECIOV_PRODUCTO, STOCK_PRODUCTO, IMAGEN_PRODUCTO FROM PRODUCTO WHERE ID_TIENDA = 1";
$resultado = mysqli_query($conn, $sql);

// Verificar si se encontraron resultados
if (mysqli_num_rows($resultado) > 0) {
    $productos = array();
    // Recorrer los resultados y mostrarlos
    while($fila = mysqli_fetch_assoc($resultado)) {
        /*
        echo "<script>console.log('Nombre: " . $fila['ID_PRODUCTO'] . "')</script>";
        echo "<script>console.log('Nombre: " . $fila['NOMBRE_PRODUCTO'] . "')</script>";
        echo "<script>console.log('Nombre: " . $fila['PRECIOV_PRODUCTO'] . "')</script>";
        echo "<script>console.log('Nombre: " . $fila['STOCK_PRODUCTO'] . "')</script>";
        echo "<script>console.log('Nombre: " . $fila['IMAGEN_PRODUCTO'] . "')</script>";    
        */     
        $productos[] = $fila;
    }
    //echo "<script>console.log('".json_encode($productos)."')</script>";
    echo "<script> var productos = ".json_encode($productos)."; </script>";
} else {
    echo "<script>console.log('No se encontraron resultados')</script>";
}