<?php
session_start();
include_once dirname(__DIR__) . '/conection.php';

$sql = "SELECT ID_DETALLEV,NOMBRE_PRODUCTO_DETALLEV,PRECIOV_PRODUCTO,CANTIDAD_DETALLEV,SUBTOTAL_DETALLEV
FROM (SELECT ID_VENTA 
      FROM (SELECT ID_TIENDA 
            FROM TIENDA 
            WHERE ID_ADMIN = $id_admin) t,VENTA v 
      WHERE t.ID_TIENDA = v.ID_TIENDA) a,DETALLE_VENTA d,PRODUCTO p 
WHERE a.ID_VENTA = d.ID_VENTA AND d.ID_PRODUCTO = p.ID_PRODUCTO ORDER BY CANTIDAD_DETALLEV DESC";

$dettodventa = mysqli_query($conn, $sql);

$cantidad_det_tod_ventas = mysqli_num_rows($dettodventa);
$dettodventa1 = NULL;

if ($cantidad_det_tod_ventas > 0) {
    $dettodventa1 = array();
    while ($fila = mysqli_fetch_assoc($dettodventa)) {
        $dettodventa1[] = array(
            'ID_DETALLEV' => $fila['ID_DETALLEV'],
            'NOMBRE_PRODUCTO_DETALLEV' => $fila['NOMBRE_PRODUCTO_DETALLEV'],
            'PRECIOV_PRODUCTO' => $fila['PRECIOV_PRODUCTO'],
            'CANTIDAD_DETALLEV' => $fila['CANTIDAD_DETALLEV'],
            'SUBTOTAL_DETALLEV' => $fila['SUBTOTAL_DETALLEV']
        );
    }
    $_SESSION['dettodventa2'] = $dettodventa1;
    echo "<script> var dettodventa2 = " . json_encode($dettodventa1) . "; </script>";
} else {
    $_SESSION['dettodventa2'] = $dettodventa1;
}
$suma_subtotal=0;
if($dettodventa1!=NULL){
    foreach ($dettodventa1 as $valor) {
        $suma_subtotal += $valor['SUBTOTAL_DETALLEV'];
    }}
?>

