<?php

session_start();
include_once dirname(__DIR__) . '/conection.php';

    if (empty($_GET['id'])) {
        header('Location: mostrar_proveedores.php');
    }
    $idproveedor = $_GET["id"]; 
    $_SESSION['idproveedor'] = $idproveedor;
    $sql="SELECT * FROM PROVEEDOR WHERE ID_PROVEEDOR = $idproveedor";
    
    $resultado = mysqli_query($conn,$sql);

    $valor = mysqli_fetch_array($resultado);

    ?>
