<?php
include_once dirname(__DIR__) . '/conection.php';

    $nombre = $_POST["nombre"] ;
    $venta = $_POST["venta"] ;
    $compra = $_POST["compra"] ;
    $fecha = $_POST["fecha"] ;
    $categoria = $_POST["categoria"] ;
    $cantidad = $_POST["cantidad"] ;
    $descripcion = $_POST["descripcion"] ;


    $sql = "INSERT INTO `PRODUCTO`(`ID_TIENDA`, `ID_CATEGORIA`, `NOMBRE_PRODUCTO`, `PRECIOV_PRODUCTO`, `PRECIOC_PRODUCTO`, `VENCIMIENTO_PRODUCTO`, `STOCK_PRODUCTO`, `IMAGEN_PRODUCTO`, `DESCRIPCION_PRODUCTO`) VALUES ('1','1','$nombre','$venta','$compra','$fecha','$cantidad','imagen','$descripcion')";

    $query = mysqli_query($conn, $sql);

    if($query){
        echo "correcto";
    }else{
        echo "incorrecto";
    }






    




    