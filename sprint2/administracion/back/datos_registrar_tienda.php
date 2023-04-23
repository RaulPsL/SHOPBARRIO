<?php
include_once dirname(__DIR__) . '/conection.php';

    $nombretienda = $_POST["nombretienda"] ;
    $direccion = $_POST["direccion"] ;
    $referencia = $_POST["referencia"] ;
    $telefono = $_POST["telefono"] ;

    $sql = "INSERT INTO `TIENDA`(`ID_TIENDA`, `ID_CATEGORIA`, `NOMBRE_PRODUCTO`, `PRECIOV_PRODUCTO`, `PRECIOC_PRODUCTO`, `VENCIMIENTO_PRODUCTO`, `STOCK_PRODUCTO`, `IMAGEN_PRODUCTO`, `DESCRIPCION_PRODUCTO`) VALUES ('1',$categoria,'$nombre','$venta','$compra','$fecha','$cantidad','$ruta','$descripcion')";

    $query = mysqli_query($conn, $sql);

    if($query){
        echo "bien puta";
    }else{   
        echo "incorrecto";
    }