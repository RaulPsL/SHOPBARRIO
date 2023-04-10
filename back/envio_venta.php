<?php
session_start();
include_once dirname(__DIR__) . '/conection.php';
$productos=$_SESSION['productos'];

$elementos = json_decode($_POST["elementos"]);
$total = mysqli_real_escape_string($conn, $_POST["total"]);
$fecha= date("Y-m-d");

if($total>0){
    $sql = "INSERT INTO VENTA (ID_TIENDA, FECHA_VENTA, TOTAL_VENTA) VALUES ('1', '$fecha', '$total')";
    mysqli_query($conn, $sql);
}

// Obtener el ID de la venta recién insertada
$id_venta = mysqli_insert_id($conn);

// Recorrer los elementos y agregarlos a la base de datos
foreach ($elementos as $elemento) {
    $id = mysqli_real_escape_string($conn, $elemento->id);
    $cantidad = mysqli_real_escape_string($conn, $elemento->cantidad);
    $subTotal=$cantidad*$productos[$id]["PRECIOV_PRODUCTO"];

    $sql = "INSERT INTO DETALLE_VENTA (ID_VENTA, ID_PRODUCTO, NOMBRE_PRODUCTO_DETALLEV, SUBTOTAL_DETALLEV, CANTIDAD_DETALLEV) VALUES ('$id_venta', '$id', '{$productos[$id]["NOMBRE_PRODUCTO"]}', '$subTotal', '$cantidad')";
    
    mysqli_query($conn, $sql);
}
?>