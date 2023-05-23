<?php
session_start();
include_once dirname(__DIR__) . '/conection.php';
$sql = "SELECT V.ID_VENTA, V.FECHA_VENTA, V.TOTAL_VENTA 
FROM ADMINISTRADOR A JOIN TIENDA T ON A.ID_ADMIN = T.ID_ADMIN JOIN VENTA V ON V.ID_TIENDA = T.ID_TIENDA JOIN VENTA DE ON DE.ID_VENTA = V.ID_VENTA
WHERE A.ID_ADMIN = $id_admin";


$ventreal = mysqli_query($conn, $sql);


$cantidad_ventas=0;
$cantidad_ventas = mysqli_num_rows($ventreal);
$ventas1=NULL;

// Verificar si se encontraron resultados
if (mysqli_num_rows($ventreal) > 0) {
    $ventas1 = array();
    // Recorrer los resultados y mostrarlos
    while($fila = mysqli_fetch_assoc($ventreal)) {    
        $ventas1[$fila['ID_VENTA']] = array(
            'ID_VENTA' => $fila['ID_VENTA'],
            'FECHA_VENTA' => $fila['FECHA_VENTA'],
            'TOTAL_VENTA' => $fila['TOTAL_VENTA']
            
        );
    }
    $_SESSION['ventas1'] = $ventas1;
    echo "<script> var ventas1 = ".json_encode($ventas1)."; </script>";
} else {
    $_SESSION['ventas1'] = $ventas1;
}

$suma_realizados= 0;
if($ventas1!=NULL){
foreach ($ventas1 as $valor) {
    $suma_realizados += $valor['TOTAL_VENTA'];
}
}
?>
