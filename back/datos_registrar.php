<?php
include_once dirname(__DIR__) . '/conection.php';

    $nombre = $_POST["nombre"] ;
    $venta = $_POST["venta"] ;
    $compra = $_POST["compra"] ;
    $fecha = $_POST["fecha"] ;
    $categoria = $_POST["categoria"] ;
    $cantidad = $_POST["cantidad"] ;
    $descripcion = $_POST["descripcion"] ;

    // Datos de la imagen 
    $imagen = $_FILES['subir']['name'];
    $tipo =  $_FILES['subir']['type'];
    $temp =  $_FILES['subir']['tmp_name'];

    //ruta
    $carpeta='uploads/user_1';
    $ruta = $carpeta.'/'.$imagen;
    $carpeta='../uploads/user_1';

    move_uploaded_file($temp,$carpeta.'/'.$imagen);


    $sql = "INSERT INTO `PRODUCTO`(`ID_TIENDA`, `ID_CATEGORIA`, `NOMBRE_PRODUCTO`, `PRECIOV_PRODUCTO`, `PRECIOC_PRODUCTO`, `VENCIMIENTO_PRODUCTO`, `STOCK_PRODUCTO`, `IMAGEN_PRODUCTO`, `DESCRIPCION_PRODUCTO`) VALUES ('1',$categoria,'$nombre','$venta','$compra','$fecha','$cantidad','$ruta','$descripcion')";

    $query = mysqli_query($conn, $sql);

    if($query){
        
        ?>
        <script>window.location.href = "https://shopbarrio.online/administracion/mostrar_productos";</script>
        <?php
    }else{
        
        echo "incorrecto";
    }