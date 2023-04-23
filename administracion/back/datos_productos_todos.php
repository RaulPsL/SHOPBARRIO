<?php
session_start();
include_once dirname(__DIR__) . '/conection.php';
// Ejecutar una consulta SELECT

$sql = "SELECT P.ID_PRODUCTO, P.NOMBRE_PRODUCTO, P.PRECIOV_PRODUCTO, P.STOCK_PRODUCTO, P.IMAGEN_PRODUCTO, P.ID_TIENDA
        FROM TIENDA T JOIN PRODUCTO P ON P.ID_TIENDA = T.ID_TIENDA
        WHERE T.ID_TIENDA = 1
        ";
$resultado = mysqli_query($conn, $sql);
$productos=NULL;
// Verificar si se encontraron resultados
if (mysqli_num_rows($resultado) > 0) {
    $productos = array();
    // Recorrer los resultados y mostrarlos
    while($fila = mysqli_fetch_assoc($resultado)) {    
        $productos[$fila['ID_PRODUCTO']] = array(
            'ID_PRODUCTO' => $fila['ID_PRODUCTO'],
            'NOMBRE_PRODUCTO' => $fila['NOMBRE_PRODUCTO'],
            'PRECIOV_PRODUCTO' => $fila['PRECIOV_PRODUCTO'],
            'STOCK_PRODUCTO' => $fila['STOCK_PRODUCTO'],
            'IMAGEN_PRODUCTO' => $fila['IMAGEN_PRODUCTO'],
            'ID_TIENDA' => $fila['ID_TIENDA']
        );
    }
    $_SESSION['productos'] = $productos;
    echo "<script> var productos = ".json_encode($productos)."; </script>";
} else {
    $_SESSION['productos'] = $productos;
}