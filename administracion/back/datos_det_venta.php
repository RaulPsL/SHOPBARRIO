<?php
session_start();
include_once dirname(__DIR__) . '/conection.php';
$id_venta_ac=$_GET['id_venta'];
$sql = "SELECT ID_DETALLEV,ID_VENTA,NOMBRE_PRODUCTO_DETALLEV,PRECIOV_PRODUCTO,CANTIDAD_DETALLEV,SUBTOTAL_DETALLEV
 FROM DETALLE_VENTA d,PRODUCTO p WHERE d.ID_PRODUCTO = p.ID_PRODUCTO AND ID_VENTA =$id_venta_ac";

$detventa = mysqli_query($conn, $sql);

$cantidad_det_ventas = mysqli_num_rows($detventa);
$detventa1 = NULL;

if ($cantidad_det_ventas > 0) {
    $detventa1 = array();
   
    while ($fila = mysqli_fetch_assoc($detventa)) {
        $detventa1[$fila['ID_DETALLEV']] = array(
            'ID_VENTA' => $fila['ID_VENTA'],
            'ID_DETALLEV' => $fila['ID_DETALLEV'],
            'NOMBRE_PRODUCTO_DETALLEV' => $fila['NOMBRE_PRODUCTO_DETALLEV'],
            'PRECIOV_PRODUCTO' => $fila['PRECIOV_PRODUCTO'],
            'CANTIDAD_DETALLEV' => $fila['CANTIDAD_DETALLEV'],
            'SUBTOTAL_DETALLEV' => $fila['SUBTOTAL_DETALLEV']
        );
        
    }
    $_SESSION['detventa2'] = $detventa1;
    echo "<script> var detventa2 = " . json_encode($detventa1) . "; </script>";
} else {
    $_SESSION['detventa2'] = $detventa1;
}

?>


<?php

$suma_cantidad = 0;
foreach ($detventa1 as $detalle) {
    $suma_cantidad += $detalle['CANTIDAD_DETALLEV'];
}


?>

<?php

$suma_subtotal= 0;
foreach ($detventa1 as $detalle) {
    $suma_subtotal += $detalle['SUBTOTAL_DETALLEV'];
}

?>