<?php
 
include_once dirname(__DIR__) . '/conection.php';
    $id_admin = $_SESSION["usuario"]["id_admin"];
    $id_tienda = $_SESSION["usuario"]["id_tienda"];
    
    $idproveedor=$_POST["id"]; 
    $nombre = $_POST["nombre_proveedor"] ;
    $telefono = $_POST["telefono"] ;
    $email = $_POST["email"] ;
    $empresa = $_POST["empresa"] ;
    $descripcion = $_POST["descripcion"] ;

    $query = mysqli_query($conn,"SELECT * FROM `PROVEEDOR` WHERE `ID_PROVEEDOR` = $idproveedor");
    
  
 
    $result = mysqli_fetch_array($query);

    $sql_update = mysqli_query($conn,"UPDATE `PROVEEDOR` 
    SET `NOMBRE_PROVEEDOR`='$nombre',`CELULAR_PROVEEDOR`='$telefono',`EMAIL_PROVEEDOR`='$email',`EMPRESA_PROVEEDOR`='$empresa',`DESCRIPCION_PROVEEDOR`='$descripcion' WHERE `ID_PROVEEDOR` = $idproveedor");

    if($sql_update){
        header('Location: ../mostrar_proveedores');
    }else{
        echo "te amo senpai u//w//u";
    }


    
    