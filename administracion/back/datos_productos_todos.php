<?php
//session_start();
include_once dirname(__DIR__) . '/conection.php';
// Ejecutar una consulta SELECT

$sql = "SELECT  P.ID_PRODUCTO, P.NOMBRE_PRODUCTO, P.PRECIOV_PRODUCTO, P.STOCK_PRODUCTO, P.IMAGEN_PRODUCTO, P.ID_CATEGORIA, P.ID_TIENDA, C.NOMBRE_CATEGORIA
        FROM ADMINISTRADOR A JOIN TIENDA T ON A.ID_ADMIN = T.ID_ADMIN JOIN PRODUCTO P ON P.ID_TIENDA = T.ID_TIENDA JOIN CATEGORIA C ON P.ID_CATEGORIA=C.ID_CATEGORIA
        WHERE A.ID_ADMIN = $id_admin  ORDER BY P.NOMBRE_PRODUCTO ASC
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
		    'ID_CATEGORIA' => $fila['ID_CATEGORIA'],
            'ID_TIENDA' => $fila['ID_TIENDA'],
            'NOMBRE_CATEGORIA'=>$fila['NOMBRE_CATEGORIA'], 
        );
    }
    //$_SESSION['productos'] = $productos;
} else {
    //$_SESSION['productos'] = $productos;
    $productos=NULL;
}