<?php
session_start();
include_once dirname(__DIR__) . '/conection.php';
$id_tienda = $_SESSION["usuario"]["id_tienda"];

    $nombreproveedor = $_POST["nombreproveedor"] ;
    $telefono = $_POST["telefono"] ;
    $email = $_POST["email"] ;
    $empresa = $_POST["empresa"] ;
    $descripcion = $_POST["descripcion"] ;
  
    $sql = "INSERT INTO `PROVEEDOR`(`ID_TIENDA`, `NOMBRE_PROVEEDOR`, `CELULAR_PROVEEDOR`, `EMAIL_PROVEEDOR`, `DESCRIPCION_PROVEEDOR`, 'EMPRESA_PROVEEDOR')
                            VALUES ($id_tienda, '$nombreproveedor',  '$celular',          '$email',           '$descripcion',          '$empresa')";
    $query = mysqli_query($conn, $sql);

    if($query){
        /*header('Location: ../mostrar_proveedor'); */
        echo "correcto";
    }else{   
        echo "incorrecto";
    }